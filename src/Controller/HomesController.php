<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

class HomesController extends AppController
{
    use MailerAwareTrait;

    private $NO_DIGITAL_PRODUCTS = 1;
    private $DIGITAL_PRODUCTS = 2;
    private $RANDOM_CODE_DEFAULT = '1';
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(
            [
                'site',
                'profile',
                'store',
                'productView',
                'storeCart',
                'storeCart',
                'storeContact',
                'addMessage',
                'search',
                'passGenerator',
                'receipts',
                'courseView',
                'videos',
                'video',
                'terms',
            ]
        );
        $this->loadComponent('Encrypt');
    }

    public function site()
    {
        $this->viewBuilder()->setLayout('site');
        $this->loadModel('StoresSliders');
        $this->loadModel('StoresPartners');
        $this->loadModel('Configs');
        $storesSliders = $this->StoresSliders->find('all');
        $storesPartners = $this->StoresPartners->find('all');
        $configs = $this->Configs->find('all')->toArray();
        $configs[0]['show_type_products'] === $this->NO_DIGITAL_PRODUCTS ?
            $this->loadFrontNoDigital($storesSliders, $storesPartners) :
            $this->loadFrontDigital($storesSliders, $storesPartners);
    }

    public function store($idCategory = null)
    {
        $this->viewBuilder()->setLayout('site');
        $configs = $this->Configs->find('all')->first();
        $this->loadModel('StoresCourses');
        $this->paginate = [
            'limit' => 6,
            'order' => [
                'StoresCourses.id' => 'DESC'
            ],
            'conditions' => [
                'StoresCourses.id !=' => 37,
                'StoresCourses.status !=' => 0,
            ]
        ];
        $storesCourses = $this->paginate($this->StoresCourses);
        $this->set(compact(
            [
                'storesCourses',
            ]
        ));
    }

    public function demands()
    {
        $this->hasPermission('store');
        $this->loadModel('StoresDemands');

        $this->paginate = [
            'limit' => 6,
            'order' => [
                'StoresDemands.id' => 'DESC'
            ],
            'conditions' => [
                'StoresDemands.users_id =' => $this->Auth->user()['id'],
            ]
        ];

        $storesDemands = $this->paginate($this->StoresDemands);

        $this->set(
            [
                'storesDemands' => $storesDemands
            ]
        );
    }

    public function productView($id = null, $colorId = null, $codeRandomProduct = null)
    {
        $this->viewBuilder()->setLayout('site');
        $this->loadModel('StoresProducts');
        $this->loadModel('StoresColors');
        $this->loadModel('StoresImagesProducts');
        $this->loadModel('StoresComments');
        $imagesExtrasProduct = $this->StoresImagesProducts->find('all', [
            'conditions' => [
                'StoresImagesProducts.stores_products_id =' => $id,
                'StoresImagesProducts.photo !=' => 'Null',
            ]
        ]);
        $relationshipProducts = null;
        if (!$colorId && !$codeRandomProduct) {
            $storesProduct = $this->StoresProducts->get(
                $id,
                [
                    'contain' => ['StoresCategories']
                ]
            );
            $relationshipProducts = $this->getRelationshipProducts($storesProduct);
            $data = [];
            if ($storesProduct->random_code == $this->RANDOM_CODE_DEFAULT) {
                $data['random_code'] = uniqid('product_', true);
                $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);
                $this->StoresProducts->save($storesProduct);
                $storesProduct = $this->StoresProducts->get(
                    $id,
                    [
                        'contain' => ['StoresCategories']
                    ]
                );
            }
            if ($this->verifyColors($storesProduct)) {
                $idColor = $this->saveColor($id, $storesProduct->random_code);
                $data['stores_colors_id'] = $idColor;
                $storesProduct = $this->StoresProducts->patchEntity($storesProduct, $data);
                $this->StoresProducts->save($storesProduct);
            }
            $storesColors = $this->StoresColors->find(
                'all',
                [
                    'conditions' => [
                        'StoresColors.product_flag_code =' => $storesProduct->random_code
                    ]
                ]
            );
            $idUser = $this->Auth->user() ? $this->Auth->user()['id'] : null;
        } else {
            $storesProduct = $this->StoresProducts->get(
                $id,
                [
                    'contain' => ['StoresCategories'],
                    'coditions' => [
                        'StoresProducts.stores_colors_id =' => $colorId,
                        'StoresProducts.randon_code =' => $codeRandomProduct
                    ]
                ]
            );
            $relationshipProducts = $this->getRelationshipProducts($storesProduct);
            $storesColors = $this->StoresColors->find(
                'all',
                [
                    'conditions' => [
                        'StoresColors.product_flag_code =' => $storesProduct->random_code
                    ]
                ]
            );
            $idUser = $this->Auth->user() ? $this->Auth->user()['id'] : null;
        }
        $storesComments = $this->StoresComments->find('all')->limit(7);
        $this->set(compact(
            [
                'storesProduct',
                'idUser',
                'storesColors',
                'imagesExtrasProduct',
                'relationshipProducts',
                'storesComments',
            ]
        ));
    }

    public function courseView($id = null)
    {
        $this->loadModel('StoresCourses');
        $this->loadModel('StoresMenus');
        $this->viewBuilder()->setLayout('site');

        if ($id == 37) {
            $this->redirect(['action' => 'courseView', 36]);
        }
        $storesCourse = $this->StoresCourses->get($id);
        $idUser = $this->Auth->user() ? $this->Auth->user()['id'] : null;
        $menus = $this->StoresMenus->find('all', [
            'conditions' => [
                'StoresMenus.stores_courses_id =' => $id
            ]
        ]);

        $this->set(compact(
            [
                'storesCourse',
                'idUser',
                'menus'
            ]
        ));
    }

    private function getRelationshipProducts($storesProduct)
    {
        return $this->StoresProducts->find('all', [
            'conditions' => [
                'StoresProducts.stores_categories_id =' => $storesProduct->stores_categories_id,
                'StoresProducts.quantity >' => 0,
                'StoresProducts.online =' => 1,
                'StoresProducts.active =' => 1,
                'StoresProducts.photo !=' => 'Indefinida',
                'StoresProducts.package_format !=' => 0,
                'StoresProducts.package_lengths !=' => 0,
                'StoresProducts.package_height !=' => 0,
                'StoresProducts.package_width !=' => 0,
                'StoresProducts.price >' => 0,
            ]
        ])->limit(7);
    }

    public function storeCart($shippingValue = null, $cep = null, $prazoEntrega = null)
    {
        $this->hasPermission('store');
        $this->loadModel('Configs');
        $configs = $this->Configs->find('all')->first();
        if ($configs->show_type_products === $this->DIGITAL_PRODUCTS) {
            return $this->redirect(['action' => 'storeCartDigital']);
        }
        $session = $this->request->getSession();
        $session->delete('address_demand');
        $this->loadModel('StoresCarts');
        $storesCarts = $this->StoresCarts->find(
            'all',
            [
                'contain' => ['StoresProducts'],
                'conditions' => [
                    'StoresCarts.users_id =' => $this->Auth->user()['id']
                ]
            ]
        );
        if (empty($storesCarts->toArray())) {
            return $this->redirect(['action' => 'store']);
        }
        $total = 0;
        foreach ($storesCarts as $storesCart) {
            $total =  $total + (str_replace(",", ".", $storesCart->stores_product->price) * (float) $storesCart->quantity);
        }
        $shippingValue = str_replace(",", ".", $shippingValue);
        if ($shippingValue) {
            $total = (float) $total + (float) $shippingValue;
        }
        if ($cep) {
            $this->set(compact(
                [
                    'storesCarts',
                    'total',
                    'cep',
                    'prazoEntrega'
                ]
            ));
        } else {
            $this->set(compact(
                [
                    'storesCarts',
                    'total',
                    'cep',
                    'prazoEntrega',
                ]
            ));
        }
    }

    public function storeCartDigital($shippingValue = null, $cep = null, $prazoEntrega = null)
    {
        $this->hasPermission('store');
        $this->loadModel('StoresCarts');
        $storesCarts = $this->StoresCarts->find(
            'all',
            [
                'contain' => ['StoresCourses'],
                'conditions' => [
                    'StoresCarts.users_id =' => $this->Auth->user()['id'],
                    'StoresCarts.stores_courses_id !=' => 'null',
                ]
            ]
        );
        if (empty($storesCarts->toArray())) {
            return $this->redirect(['action' => 'store']);
        }
        $total = 0;
        foreach ($storesCarts as $storesCart) {
            $total =  $total + (str_replace(",", ".", $storesCart->stores_course->price) * (float) $storesCart->quantity);
        }
        $shippingValue = str_replace(",", ".", $shippingValue);
        if ($shippingValue) {
            $total = (float) $total + (float) $shippingValue;
        }
        if ($cep) {
            $this->set(compact(
                [
                    'storesCarts',
                    'total',
                    'cep',
                    'prazoEntrega'
                ]
            ));
        } else {
            $this->set(compact(
                [
                    'storesCarts',
                    'total',
                    'cep',
                    'prazoEntrega',
                ]
            ));
        }
    }

    public function storeRemoveItemCart($id = null)
    {
        $this->hasPermission('store');
        $this->loadModel('StoresCarts');
        $this->request->allowMethod(['post', 'delete']);
        $storesCart = $this->StoresCarts->get($id);
        $this->StoresCarts->delete($storesCart);
        $session = $this->request->getSession();
        $session->delete('Flash');
        return $this->redirect(['controller' => 'homes', 'action' => 'storeCart']);
    }

    public function storeCheckout()
    {
        $this->hasPermission('store');
        $this->loadModel('StoresCarts');
        $storesCarts = $this->StoresCarts->find(
            'all',
            [
                'contain' => ['StoresProducts'],
                'conditions' => [
                    'StoresCarts.users_id =' => $this->Auth->user()['id']
                ]
            ]
        );
        if (empty($storesCarts->toArray())) {
            return $this->redirect(['action' => 'store']);
        }
        $total = 0;
        foreach ($storesCarts as $storesCart) {
            $total = $total + ($storesCart->stores_product->price * $storesCart->quantity);
        }
        $this->set(compact('storesCarts', 'total'));
    }

    public function storeConfirm($demandId = null)
    {
        $this->hasPermission('store');
        $this->set('demandId', $demandId);
    }

    public function search($idCategory = null, $idSubCategory = null, $idFinalCategory = null)
    {
        $this->viewBuilder()->setLayout('site');
        $this->loadModel('StoresCategories');
        $this->loadModel('StoresProducts');
        $this->loadModel('StoresCourses');
        $this->loadModel('Configs');

        $configs = $this->Configs->find('all')->first();

        $storesCategories = $this->StoresCategories->find(
            'all',
            [
                'limit' => 20
            ]
        );

        if ($idCategory && $idSubCategory && $idFinalCategory) {
            $this->paginate = [
                'limit' => 6,
                'order' => [
                    'StoresProducts.id' => 'DESC'
                ],
                'conditions' => [
                    'StoresProducts.quantity >' => 0,
                    'StoresProducts.online =' => 1,
                    'StoresProducts.active =' => 1,
                    'StoresProducts.stores_categories_id =' => $idCategory,
                    'StoresProducts.stores_subcategories_id =' => $idSubCategory,
                    'StoresProducts.stores_finalcategories_id =' => $idFinalCategory,
                ]
            ];

            $storesProducts = $this->paginate($this->StoresProducts);

            $this->set(compact(
                [
                    'storesCategories',
                    'storesProducts'
                ]
            ));
        } else {
            if ($configs->show_type_products === $this->DIGITAL_PRODUCTS) {
                $this->paginate = [
                    'limit' => 6,
                    'order' => [
                        'StoresProducts.id' => 'DESC'
                    ],
                    'conditions' => [
                        'StoresCourses.status =' => 1,
                        'StoresCourses.course LIKE' => '%' . $this->request->getQuery('search') . '%',
                    ]
                ];

                $storesCourses = $this->paginate($this->StoresCourses);

                $this->set(compact(
                    [
                        'storesCategories',
                        'storesCourses'
                    ]
                ));
            } else {
                $this->paginate = [
                    'limit' => 6,
                    'order' => [
                        'StoresProducts.id' => 'DESC'
                    ],
                    'conditions' => [
                        'StoresProducts.quantity >' => 0,
                        'StoresProducts.online =' => 1,
                        'StoresProducts.active =' => 1,
                        'StoresProducts.product LIKE' => '%' . $this->request->getQuery('search') . '%',
                    ]
                ];

                $storesProducts = $this->paginate($this->StoresProducts);

                $this->set(compact(
                    [
                        'storesCategories',
                        'storesProducts'
                    ]
                ));
            }
        }
    }

    public function storeContact($sended = null)
    {
        if ($sended) {
            $this->set(compact(
                [
                    'sended',
                ]
            ));
        }
    }

    public function terms()
    {
        $this->loadModel('StoresTerms');
        $storesTerms = $this->StoresTerms->find('all')->first();
        $this->set(compact('storesTerms'));
    }

    public function addMessage()
    {
        $this->loadModel('StoresMessages');
        $storesMessage = $this->StoresMessages->newEntity();
        if ($this->request->is('post')) {
            $storesMessage = $this->StoresMessages->patchEntity($storesMessage, $this->request->getData());
            if ($this->StoresMessages->save($storesMessage)) {
                $sended = true;
                return $this->redirect(['controller' => 'homes', 'action' => 'storeContact', $sended]);
            }
        }
    }

    public function editWhatsapp($number = null)
    {
        $this->hasPermission('storeAdmin');
        $home = $this->Homes->find('all')->first();
        $data = $home;
        $data['whatsapp_number'] = $number;
        if ($this->request->is(['get'])) {
            $home = $this->Homes->patchEntity($home, $data->toArray());
            if ($this->Homes->save($home)) {
                return $this->response->withStatus(200)->withType('application/json')
                    ->withStringBody(json_encode(['msg' => 'Salvo com sucesso!']));
            } else {
                return $this->response->withStatus(405)->withType('application/json')
                    ->withStringBody(json_encode(['msg' => 'Erro!']));
            }
        }
    }

    public function editFacebook($link = null)
    {
        $this->hasPermission('storeAdmin');
        $home = $this->Homes->find('all')->first();
        $data = $home;
        $data['facebook_link'] = base64_decode($link);
        if ($this->request->is(['get'])) {
            $home = $this->Homes->patchEntity($home, $data->toArray());
            if ($this->Homes->save($home)) {
                return $this->response->withStatus(200)->withType('application/json')
                    ->withStringBody(json_encode(['msg' => 'Salvo com sucesso!']));
            } else {
                return $this->response->withStatus(405)->withType('application/json')
                    ->withStringBody(json_encode(['msg' => 'Erro!']));
            }
        }
    }

    public function editInstagram($link = null)
    {
        $this->hasPermission('storeAdmin');
        $home = $this->Homes->find('all')->first();
        $data = $home;
        $data['instagram_link'] = base64_decode($link);
        if ($this->request->is(['get'])) {
            $home = $this->Homes->patchEntity($home, $data->toArray());
            if ($this->Homes->save($home)) {
                return $this->response->withStatus(200)->withType('application/json')
                    ->withStringBody(json_encode(['msg' => 'Salvo com sucesso!']));
            } else {
                return $this->response->withStatus(405)->withType('application/json')
                    ->withStringBody(json_encode(['msg' => 'Erro!']));
            }
        }
    }

    private function saveColor($idProduct = null, $product_flag_code = null)
    {
        $this->loadModel('StoresColors');
        $storesColor = $this->StoresColors->newEntity();
        $data = [];
        $data['color'] = '#FFF';
        $data['product_flag_code'] = $product_flag_code;
        $data['stores_products_id'] = $idProduct;
        $storesColor = $this->StoresColors->patchEntity($storesColor, $data);
        $this->StoresColors->save($storesColor);
        return $storesColor->id;
    }

    private function verifyColors($storesProduct)
    {
        $storesColors = $this->StoresColors->find(
            'all',
            [
                'conditions' => [
                    'StoresColors.stores_products_id =' => $storesProduct->id
                ]
            ]
        );
        return empty($storesColors->toArray()) ? true : false;
    }

    public function error($message)
    {
        $this->hasPermission('store');
        $this->set('message', base64_decode($message));
    }

    public function errorGeneral($message)
    {
        $this->hasPermission('store');
        $this->set('message', base64_decode($message));
    }

    public function profile()
    {
        $this->viewBuilder()->setLayout('site');
        $this->hasPermission('store');
        $this->loadModel('Users');
    }

    public function setCpf()
    {
        $this->autoRender = false;
        $session = $this->request->getSession();
        $session->write('cpf', $this->request->getData()['cpf']);
        $this->redirect($this->referer());
    }

    private function loadFrontDigital($storesSliders = null, $storesPartners = null)
    {
        $this->loadModel('StoresCourses');
        $this->paginate = [
            'limit' => 16,
            'order' =>
            [
                'StoresCourses.id' => 'DESC'
            ],
            'conditions' => [
                'StoresCourses.id !=' => 37,
                'StoresCourses.status !=' => 0,
            ]
        ];
        $StoresCourses = $this->paginate($this->StoresCourses);
        $this->set(
            [
                'StoresCourses' => $StoresCourses,
                'storesSliders' => $storesSliders,
                'storesPartners' => $storesPartners,
                'NO_DIGITAL_PRODUCTS' => $this->NO_DIGITAL_PRODUCTS,
                'DIGITAL_PRODUCTS' => $this->DIGITAL_PRODUCTS,
            ]
        );
    }

    private function loadFrontNoDigital($storesSliders = null, $storesPartners = null)
    {
        $this->loadModel('StoresProducts');
        $this->paginate = [
            'limit' => 16,
            'order' => [
                'StoresProducts.id' => 'DESC'
            ],
            'conditions' => [
                'StoresProducts.quantity >' => 0,
                'StoresProducts.online =' => 1,
                'StoresProducts.active =' => 1,
                'StoresProducts.photo !=' => 'Indefinida',
                'StoresProducts.package_format !=' => 0,
                'StoresProducts.package_lengths !=' => 0,
                'StoresProducts.package_height !=' => 0,
                'StoresProducts.package_width !=' => 0,
                'StoresProducts.price >' => 0,
            ]
        ];
        $storesProducts = $this->paginate($this->StoresProducts);
        $this->set(
            [
                'storesProducts' => $storesProducts,
                'storesSliders' => $storesSliders,
                'storesPartners' => $storesPartners,
                'NO_DIGITAL_PRODUCTS' => $this->NO_DIGITAL_PRODUCTS,
                'DIGITAL_PRODUCTS' => $this->DIGITAL_PRODUCTS,
            ]
        );
    }

    public function videos()
    {
        $this->viewBuilder()->setLayout('root');
        $this->loadModel('StoresVideos');
        $storesVideos = $this->StoresVideos->find('all', [
            'conditions' => [
                'StoresVideos.public =' => true,
                'StoresVideos.active =' => true,
            ],
            'contain' => ['StoresCourses']
        ]);
        $this->set(compact('storesVideos'));
    }

    public function video($id = null)
    {
        $this->viewBuilder()->setLayout('root');
        $this->loadModel('StoresVideos');
        $this->loadModel('VideosVieweds');
        $this->loadModel('CoursesDownloads');
        $id = $this->Encrypt->simpleCrypt($id, 'd');
        $storesVideo = $this->StoresVideos->get(
            $id,
            [
                'contain' => ['StoresCourses', 'Users'],
                'conditions' => [
                    'StoresVideos.public =' => true,
                    'StoresVideos.active =' => true,
                ],
            ]
        );
        $viewed = $this->VideosVieweds->find(
            'all',
            [
                'conditions' => [
                    'VideosVieweds.stores_courses_id =' => $storesVideo->stores_courses_id,
                    'VideosVieweds.stores_videos_id =' => $storesVideo->id,
                ]
            ]
        );
        $downloads = $this->CoursesDownloads->find(
            'all',
            [
                'conditions' => [
                    'CoursesDownloads.stores_courses_id =' => $storesVideo->stores_courses_id,
                    'CoursesDownloads.stores_videos_id =' => $storesVideo->id,
                ]
            ]
        );
        $this->set(compact('storesVideo', 'viewed', 'downloads'));
    }

    public function builderAccepts()
    {
        $this->hasPermission('store');

        $this->viewBuilder()->setLayout('site');

        $idUser = $this->Auth->user()['id'];

        $user = $this->Users->get($idUser, [
            'contain' => ['Roles'],
        ]);

        if ($user->role->id === 14) {
            $this->redirect(['controller' => 'storesCourses', 'action' => 'courses']);
        }

        if ($this->request->is('post')) {
            $this->loadModel('Users');

            $idUser = $this->Auth->user()['id'];

            $user = $this->Users->get($idUser);

            $data['roles_id'] = 14;

            $user = $this->Users->patchEntity($user, $data);

            if ($this->Users->save($user)) {
                $this->redirect(['controller' => 'storesCourses', 'action' => 'courses']);
            }
        }
    }
}
