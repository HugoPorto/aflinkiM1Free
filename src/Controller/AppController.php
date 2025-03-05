<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

class AppController extends Controller
{
    public function initialize()
    {
        $preferredLanguage = $this->request->getCookie('preferredLanguage');

        if ($preferredLanguage) {
            I18n::setLocale($preferredLanguage);
        } else {
            I18n::setLocale('en_US');
        }

        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Maintenance');
        $this->loadComponent('Flash');

        $this->loadComponent(
            'Auth',
            [
                'authenticate' => [
                    'Form' => [
                        'fields' => [
                            'username' => 'email',
                            'password' => 'password'
                        ]
                    ]
                ],
                'logoutRedirect' => ['controller' => 'users', 'action' => 'login']
            ]
        );
    }

    public function beforeFilter(Event $event)
    {
        $this->loadModels();

        $storesFooters = $this->StoresFooters->find('all')->first();
        $configs = $this->Configs->find('all')->first();
        $home = $this->Homes->find('all')->first();
        $storesLogo = $this->StoresLogos->find('all')->first();
        $storesAbouts = $this->StoresAbouts->find('all')->first();
        $storesHours = $this->StoresHours->find('all')->first();
        $storesContacts = $this->StoresContacts->find('all')->first();
        $storesTitles = $this->StoresTitles->find('all')->first();
        $storesPages = $this->StoresPages->find('all')->first();

        if ($this->Auth->user()) {
            if (
                $this->Roles->get($this->Auth->user()['roles_id'])->role === 'storeAdmin'
                || $this->Roles->get($this->Auth->user()['roles_id'])->role === 'store'
                || $this->Roles->get($this->Auth->user()['roles_id'])->role === 'root'
            ) {
                $imageProfileFront = $this->ImageProfiles->find('all')->where(['ImageProfiles.users_id =' => $this->Auth->user()['id']])->first();
                $imageProfileFront = $imageProfileFront === null ? [] : $imageProfileFront;
                $role = $this->Roles->get($this->Auth->user('roles_id'));
                $roleDefined = $role->role;
                $rolebuilder = null;

                if ($role->role_two !== null) {
                    $rolebuilder = $role->role_two;
                }

                $boxValue = $this->StoresDemands->find()->select(['sum' => 'SUM(StoresDemands.value)'])->toArray();
                $usersCount = $this->Users->find('all')->count();
            }
        } else {
            $roleDefined = 'common';
            $imageProfileFront = [];
        }

        $dados = [
            'username' => $this->Auth->user('username'),
            'name' => $this->Auth->user('name'),
            'role' => isset($roleDefined) ? $roleDefined : null,
            'roleBuilder' => isset($rolebuilder) ? $rolebuilder : null,
            'idUser' => $this->Auth->user() ? $this->Auth->user()['id'] : null,
            'imageProfileFront' => isset($imageProfileFront) ? $imageProfileFront : null,
            'footer' => $storesFooters,
            'storesAbouts' => $storesAbouts,
            'storesHours' => $storesHours,
            'storesContacts' => $storesContacts,
            'storesLogo' => $storesLogo->logo,
            'whatsapp_number' => $home->whatsapp_number,
            'facebook_link' => $home->facebook_link,
            'instagram_link' => $home->instagram_link,
            'banner' => $home->banner,
            'storesPagesTitles' => $storesTitles,
            'storesPages' => $storesPages,
            'configs' => $configs,
            'boxValue' => isset($boxValue) ? $boxValue : null,
            'usersCount' => isset($usersCount) ? $usersCount : null,
            'categoriesCount' => isset($categoriesCount) ? $categoriesCount : null,
        ];

        if ($this->request->controller != 'stripes' && $this->request->action != 'stripe') {
            unset($dados['stripeKey']);
        }

        if ($this->request->controller != 'homes' && $this->request->action != 'site') {
            unset($dados['banner']);
        }

        if (
            ($this->request->controller == 'StoresCourses' && $this->request->action == 'courses')
            || ($this->request->controller == 'Certificates' && $this->request->action == 'index')
        ) {
            unset($dados['whatsapp_number']);
            unset($dados['storesHours']);
            unset($dados['storesAbouts']);
            unset($dados['productsCount']);
        }

        $this->set($dados);
    }

    protected function loginMenuLoad()
    {
        $loginMenu = false;

        if ($this->Auth->user() !== null) {
            $loginMenu = true;
        }

        return $loginMenu;
    }

    protected function redirectReferer()
    {
        $this->redirect($this->referer());
    }

    protected function hasPermission($permission, $permissionTwo = null)
    {
        if ($this->Auth->user()) {
            $roleId = $this->Auth->user('roles_id');
            $role = $this->Roles->get($roleId)->role;

            if ($role !== $permission && $role !== $permissionTwo) {
                $this->Flash->error(__('Você não tem permissão para acessar esta área.'));
                return $this->redirect(['controller' => 'Users', 'action' => 'login']);
            }
        } else {
            $this->Flash->error(__('Você precisa estar logado para acessar esta área.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }

        if ($this->request->controller === 'Homes' && $this->request->action === 'demands' && $permission === 'storeAdmin') {
            return $this->redirect(['controller' => 'Homes', 'action' => 'site']);
        }

        if ($this->request->controller === 'Pages' && $this->Roles->get($this->Auth->user()['roles_id'])->role === 'store') {
            return $this->redirect(['controller' => 'Homes', 'action' => 'site']);
        }

        if ($this->request->controller === 'Homes' && $this->Roles->get($this->Auth->user()['roles_id'])->role !== $permission) {
            return $this->redirect(['controller' => 'Homes', 'action' => 'site']);
        }

        if ($this->Roles->get($this->Auth->user()['roles_id'])->role !== $permission) {
            return $this->redirect(['controller' => 'Homes', 'action' => 'site']);
        }

        return null;
    }

    protected function clearSession()
    {
        $_SESSION['superpass'] = false;
        $_SESSION['from_controller'] = null;
        $_SESSION['from_action'] = null;
    }

    protected function removePessoalDataSession()
    {
        $session = $this->request->getSession();
        $session->delete('cpf');
    }

    private function loadModels()
    {
        $this->loadModel('Roles');
        $this->loadModel('ImageProfiles');
        $this->loadModel('IndexSidebars');
        $this->loadModel('StoresFooters');
        $this->loadModel('StoresAbouts');
        $this->loadModel('StoresHours');
        $this->loadModel('StoresContacts');
        $this->loadModel('StoresLogos');
        $this->loadModel('StoresTitles');
        $this->loadModel('Homes');
        $this->loadModel('StoresPages');
        $this->loadModel('Configs');
        $this->loadModel('StoresDemands');
        $this->loadModel('Users');
    }
}
