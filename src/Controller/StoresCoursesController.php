<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
use CakePdf;

class StoresCoursesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Base64');
    }

    public function index()
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');
        $storesCourses = $this->StoresCourses->find('all', ['contain' => ['DigitalsCategories']]);
        $this->set(compact('storesCourses'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');
        $this->loadModel('StoresMenus');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => ['Users']
        ]);


        $storesMenu = $this->StoresMenus->find(
            'all',
            [
                'conditions' =>
                [
                    'StoresMenus.stores_courses_id' => $id
                ]
            ]
        )->toArray();

        if (empty($storesMenu)) {
            $this->Flash->error(__('Nenhuma ementa encontrada para esse curso'));
        }

        $this->set(compact('storesCourse', 'storesMenu'));
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');

        $storesCourse = $this->StoresCourses->newEntity();

        if ($this->request->is('post')) {
            $data = [];
            $data = $this->request->getData();
            $photo = $this->Base64->processMainPhoto($this->request->getData());
            $data['photo'] = $photo;
            $data['status'] = 1;
            $data['users_id'] = $this->Auth->user('id');
            $storesCourse = $this->StoresCourses->patchEntity($storesCourse, $data);

            if ($this->StoresCourses->save($storesCourse)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser salvo.']);
        }

        $digitalsCategories = $this->StoresCourses->DigitalsCategories->find('list');

        $this->set(compact('storesCourse', 'digitalsCategories'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesCourse = $this->StoresCourses->patchEntity($storesCourse, $this->request->getData());

            $this->log($this->request->getData(), 'debug');

            if ($this->StoresCourses->save($storesCourse)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser salvo.']);
        }

        $digitalsCategories = $this->StoresCourses->DigitalsCategories->find('list');

        $this->set(compact('storesCourse', 'digitalsCategories'));
    }

    public function editPhoto($id = null)
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');

        $storesCourse = $this->StoresCourses->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = [];
            $data = $this->request->getData();
            $photo = $this->Base64->processMainPhoto($this->request->getData());
            $data['photo'] = $photo;
            $storesCourse = $this->StoresCourses->patchEntity($storesCourse, $data);

            if ($this->StoresCourses->save($storesCourse)) {
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser salvo.']);
        }

        $this->set(compact('storesCourse'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');
        $this->request->allowMethod(['post', 'delete']);

        $storesCourse = $this->StoresCourses->get($id);

        if (!$this->StoresCourses->delete($storesCourse)) {
            return $this->redirect(['controller' => 'Pages', 'action' => 'error', 'O curso não poder ser apagado.']);
        }

        return $this->redirect(['action' => 'index']);
    }

    public function courses()
    {
        $this->hasPermission('store');
        $this->viewBuilder()->setLayout('root');

        $userId = $this->Auth->user('id');
        $search = $this->request->getQuery('search');

        if ($search) {
            $query = $this->StoresCourses->find()
                ->select(['StoresCourses.id', 'StoresCourses.course', 'StoresCourses.photo'])
                ->innerJoin(
                    ['stores_demands' => 'stores_demands'],
                    ['stores_demands.users_id' => $userId]
                )
                ->innerJoin(
                    ['stores_items_demands' => 'stores_items_demands'],
                    [
                        'stores_items_demands.stores_courses_id = StoresCourses.id',
                        'stores_items_demands.stores_demands_id = stores_demands.id'
                    ]
                )
                ->where(['StoresCourses.course LIKE' => '%' . $search . '%'])
                ->orWhere(['StoresCourses.autor LIKE' => '%' . $search . '%'])
                ->orWhere(['StoresCourses.description LIKE' => '%' . $search . '%'])
                ->order(['StoresCourses.id' => 'DESC']);
        } else {
            $query = $this->StoresCourses->find()
                ->select(['StoresCourses.id', 'StoresCourses.course', 'StoresCourses.photo'])
                ->innerJoin(
                    ['stores_demands' => 'stores_demands'],
                    ['stores_demands.users_id' => $userId]
                )
                ->innerJoin(
                    ['stores_items_demands' => 'stores_items_demands'],
                    [
                        'stores_items_demands.stores_courses_id = StoresCourses.id',
                        'stores_items_demands.stores_demands_id = stores_demands.id'
                    ]
                )
                ->order(['StoresCourses.id' => 'DESC']);
        }

        $this->paginate = [
            'limit' => 100
        ];

        $storesCourses = $this->paginate($query);

        $this->set(compact('storesCourses'));
    }

    public function courseView($id = null)
    {
        $this->hasPermission('store');
        $this->viewBuilder()->setLayout('root');
        $this->loadModel('StoresVideos');
        $this->loadModel('VideosVieweds');
        $this->loadModel('Certificates');
        $this->loadModel('StoresMenus');

        $storesCourse = $this->StoresCourses->get($id);
        $videosCourseCount = $this->StoresVideos->find(
            'all',
            [
                'conditions' =>
                [
                    'StoresVideos.stores_courses_id =' => $id
                ]
            ]
        )->count();

        $videosViewedsCount = $this->VideosVieweds->find(
            'all',
            [
                'conditions' =>
                [
                    'VideosVieweds.stores_courses_id =' => $id,
                    'VideosVieweds.users_id =' => $this->Auth->user()['id']
                ]
            ]
        )->count();

        $menus = $this->StoresMenus->find(
            'all',
            [
                'conditions' =>
                [
                    'StoresMenus.stores_courses_id =' => $id
                ]
            ]
        );

        if ($videosViewedsCount > 0 && $videosCourseCount > 0) {
            $percentVieweds = ($videosViewedsCount * 100) / $videosCourseCount;
        } else {
            $percentVieweds = 0;
            $videosViewedsCount = 0;
            $videosCourseCount = 0;
        }

        $this->set(compact(
            [
                'storesCourse',
                'videosCourseCount',
                'percentVieweds',
                'videosViewedsCount',
                'menus'
            ]
        ));
    }

    public function slide($idCourse = null)
    {
        $this->hasPermission('store');
        $this->viewBuilder()->setLayout('root');
        $this->loadModel('Slides');

        $slide = $this->Slides->find(
            'all',
            [
                'conditions' =>
                [
                    'Slides.stores_courses_id =' => $idCourse
                ],
                'contain' =>
                [
                    'StoresCourses'
                ]
            ]
        )->first();

        $this->set(compact('slide'));
    }

    public function videos($id = null)
    {
        $this->hasPermission('store');
        $this->viewBuilder()->setLayout('root');
        $this->loadModel('StoresVideos');

        $storesVideos = $this->StoresVideos->find('all', [
            'conditions' =>
            [
                'StoresVideos.stores_courses_id =' => $id,
            ]
        ]);

        $this->set('storesVideos', $storesVideos);
    }

    public function updateViewdVideo($idVideo = null, $idCourse = null)
    {
        $this->autoRender = false;
        $this->hasPermission('store');
        $this->loadModel('VideosVieweds');

        $userId = $this->Auth->user()['id'];
        $videosViewed = $this->VideosVieweds->newEntity();
        $data = [];
        $data['users_id'] = $userId;
        $data['stores_courses_id'] = $idCourse;
        $data['stores_videos_id'] = $idVideo;
        $videosViewed = $this->VideosVieweds->newEntity();
        $videosViewed = $this->VideosVieweds->patchEntity($videosViewed, $data);

        $this->VideosVieweds->save($videosViewed);
        $this->redirect($this->referer());
    }

    public function generateCertificate($idCourse = null)
    {
        $this->autoRender = false;
        $this->hasPermission('store');
        $this->loadModel('StoresVideos');
        $this->loadModel('VideosVieweds');
        $this->loadModel('StoresLogos');
        $this->loadModel('Cpfs');

        $course = $this->StoresCourses->get($idCourse);

        $nameCourse = $course->course;

        $storesLogo = $this->StoresLogos->find('all')->first();

        $this->log($course, 'debug');

        $cpf = $this->Cpfs->find(
            'all',
            [
                'conditions' => [
                    'Cpfs.users_id =' => $this->Auth->user()['id']
                ]
            ]
        )->first();

        $videosCourseCount = $this->StoresVideos->find(
            'all',
            [
                'conditions' =>
                [
                    'StoresVideos.stores_courses_id =' => $idCourse
                ]
            ]
        )->count();

        $videosViewedsCount = $this->VideosVieweds->find(
            'all',
            [
                'conditions' =>
                [
                    'VideosVieweds.stores_courses_id =' => $idCourse,
                    'VideosVieweds.users_id =' => $this->Auth->user()['id']
                ]
            ]
        )->count();

        if ($videosCourseCount === $videosViewedsCount) {
            $this->loadModel('Certificates');
            $certificate = $this->Certificates->find(
                'all',
                [
                    'conditions' => [
                        'Certificates.users_id =' => $this->Auth->user()['id'],
                        'Certificates.stores_courses_id =' => $idCourse
                    ]
                ]
            )->first();
            $CakePdf = new \CakePdf\Pdf\CakePdf();
            $CakePdf->template('certificate', 'certificate');
            $CakePdf->orientation('landscape');
            $CakePdf->marginLeft(10);
            $CakePdf->marginBottom(10);
            $CakePdf->marginTop(10);
            $CakePdf->marginBottom(10);
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            $codeCertificate = uniqid('certificate_', true);

            if ($certificate) {
                $CakePdf->viewVars(
                    [
                        'logo' => $storesLogo->logo,
                        'name' => $this->Auth->user()['name'],
                        'lastname' => $this->Auth->user()['lastname'],
                        'cpf' => $cpf->cpf,
                        'course' => $nameCourse,
                        'date' => $certificate->finished_course,
                        'code' => $certificate->code
                    ]
                );
                $CakePdf->output();
                $CakePdf->write(WWW_ROOT . 'files' . DS . 'certificate.pdf');
                $this->redirect('/files' . DS . 'certificate.pdf');
            } else {
                $diaSemana = ['Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado'];
                $meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];

                $timestamp = strtotime('today');
                $dia = $diaSemana[date('w', $timestamp)];
                $mes = $meses[date('n', $timestamp) - 1];
                $dataFormatada = $dia . ', ' . date('d', $timestamp) . ' de ' . $mes . ' de ' . date('Y', $timestamp);

                $this->log($dataFormatada, 'debug');

                $CakePdf->viewVars(
                    [
                        'logo' => $storesLogo->logo,
                        'name' => $this->Auth->user()['name'],
                        'lastname' => $this->Auth->user()['lastname'],
                        'cpf' => $cpf->cpf,
                        'course' => $nameCourse,
                        'date' => $dataFormatada,
                        'code' => $codeCertificate,
                    ]
                );

                $this->addCertificate($idCourse, $dataFormatada, $codeCertificate);
                $CakePdf->output();
                $CakePdf->write(WWW_ROOT . 'files' . DS . 'certificate.pdf');

                $this->redirect('/files' . DS . 'certificate.pdf');
            }
        } else {
            return $this->redirect(['controller' => 'Homes', 'action' => 'errorGeneral', base64_encode('Você ainda não concluiu o curso.')]);
        }
    }

    private function addCertificate($idCourse = null, $date = null, $code = null)
    {
        $certificate = $this->Certificates->newEntity();
        $data = [];
        $data['users_id'] = $this->Auth->user()['id'];
        $data['stores_courses_id'] = $idCourse;
        $data['finished_course'] = $date;
        $data['code'] = $code;
        $certificate = $this->Certificates->patchEntity($certificate, $data);

        $this->Certificates->save($certificate);
    }
}
