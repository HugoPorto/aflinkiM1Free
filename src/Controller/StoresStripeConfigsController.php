<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\StoresSuperpas;
use Cake\Utility\Security;

class StoresStripeConfigsController extends AppController
{
    private $showStripeKeys = null;

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Superpass');
    }

    public function index()
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        if (!$_SESSION['superpass']) {
            $this->Flash->success(__('Faça o login com super usuário para ver sua chave secreta.'));

            $this->showStripeKeys = false;
        } else {
            $this->showStripeKeys = true;
        }

        $storesStripeConfigs = $this->StoresStripeConfigs->find('all');

        $this->set(
            [
                'storesStripeConfigs' => $storesStripeConfigs,
                'showStripeKeys' => $this->showStripeKeys,
                'loginMenu' => $loginMenu
            ]
        );
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesStripeConfig = $this->StoresStripeConfigs->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesStripeConfig', $storesStripeConfig);
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $storesStripeConfig = $this->StoresStripeConfigs->newEntity();

        if ($this->request->is('post')) {
            $storesStripeConfig = $this->StoresStripeConfigs->patchEntity($storesStripeConfig, $this->request->getData());
            if ($this->StoresStripeConfigs->save($storesStripeConfig)) {
                $this->Flash->success(__('The stores stripe config has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores stripe config could not be saved. Please, try again.'));
        }

        $users = $this->StoresStripeConfigs->Users->find('list', ['limit' => 200]);

        $this->set(compact('storesStripeConfig', 'users'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        if (!$_SESSION['superpass']) {
            $this->redirect(
                [
                    'controller' => 'StoresStripeConfigs',
                    'action' => 'login',
                    $this->request->controller,
                    $this->request->action,
                    $id
                ]
            );
        }

        $storesStripeConfig = $this->StoresStripeConfigs->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesStripeConfig = $this->StoresStripeConfigs->patchEntity($storesStripeConfig, $this->request->getData());
            if ($this->StoresStripeConfigs->save($storesStripeConfig)) {
                $this->clearSession();

                $this->Flash->success(__('A configuração doi salva com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('A configuração não pode ser salva. Por favor tente novamente.'));
        }

        $users = $this->StoresStripeConfigs->Users->find('list', ['limit' => 200]);

        $this->set(compact('storesStripeConfig', 'users', 'loginMenu'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);
        $storesStripeConfig = $this->StoresStripeConfigs->get($id);

        if ($this->StoresStripeConfigs->delete($storesStripeConfig)) {
            $this->Flash->success(__('Configuração apagada com sucesso.'));
        } else {
            $this->Flash->error(__('A configuração não pode ser salva. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login($controller = null, $action = null, $idEdition = null)
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');
        $this->loadModel('StoresSuperpass');

        $_SESSION['from_controller'] = $controller;
        $_SESSION['from_action'] = $action;

        if ($this->request->is('post')) {
            $pass = Security::hash($this->request->getData()['superpass'], 'sha256', true);

            $storesSuperpass = $this->Superpass->find($pass);

            if (!empty($storesSuperpass)) {
                $_SESSION['superpass'] = true;
            } else {
                $this->Flash->error(__('Senha incorreta..'));

                $this->redirect(['action' => 'login', $controller, $action, $idEdition]);
            }

            if ($idEdition) {
                $this->redirect(['controller' => $_SESSION['from_controller'], 'action' => $_SESSION['from_action'], $idEdition]);
            } else {
                $this->redirect(['controller' => $_SESSION['from_controller'], 'action' => $_SESSION['from_action']]);
            }
        }
    }
}
