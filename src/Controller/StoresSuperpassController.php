<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Utility\Security;

class StoresSuperpassController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        $this->paginate = [
            'contain' => ['Users']
        ];
        $storesSuperpass = $this->paginate($this->StoresSuperpass);

        $this->set(compact('storesSuperpass', 'loginMenu'));
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $storesSuperpas = $this->StoresSuperpass->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->getData();

            $pass = Security::hash($this->request->getData()['superpass'], 'sha256', true);
            $data['superpass'] = $pass;

            $storesSuperpas = $this->StoresSuperpass->patchEntity($storesSuperpas, $data);

            if ($this->StoresSuperpass->save($storesSuperpas)) {
                $this->Flash->success(__('O superpass foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O Superpass não pode ser salvo. Por favor, tente novamente.'));
        }

        $this->set(compact('storesSuperpas'));
    }

    // public function edit($id = null)
    // {
    //     $this->hasPermission('storeAdmin');

    //     $storesSuperpas = $this->StoresSuperpass->get($id, [
    //         'contain' => []
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $data = $this->request->getData();

    //         $pass = Security::hash($this->request->getData()['superpass'], 'sha256', true);

    //         $data['superpass'] = $pass;

    //         $storesSuperpas = $this->StoresSuperpass->patchEntity($storesSuperpas, $data);
    //         if ($this->StoresSuperpass->save($storesSuperpas)) {
    //             $this->Flash->success(__('O superpass foi salvo com sucesso.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('O superpass não pode ser salvo. Por favor, tente novamente.'));
    //     }
    //     $users = $this->StoresSuperpass->Users->find('list', ['limit' => 200]);
    //     $this->set(compact('storesSuperpas', 'users'));
    // }
}
