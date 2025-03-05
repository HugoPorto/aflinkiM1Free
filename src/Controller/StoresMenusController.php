<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresMenusController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $storesMenus = $this->StoresMenus->find('all', [
            'contain' => [
                'Users',
                'StoresCourses'
            ]
        ]);

        $this->set(compact('storesMenus'));
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $storesMenu = $this->StoresMenus->newEntity();

        if ($this->request->is('post')) {
            $storesMenu = $this->StoresMenus->patchEntity($storesMenu, $this->request->getData());

            if ($this->StoresMenus->save($storesMenu)) {
                $this->Flash->success(__('Ementa salva com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Sua ementa não pode ser salva. Por favor, tente novamente.'));
        }

        $storesCourses = $this->StoresMenus->StoresCourses->find('list', ['limit' => 200]);

        $this->set(compact('storesMenu', 'storesCourses'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $storesMenu = $this->StoresMenus->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $storesMenu = $this->StoresMenus->patchEntity($storesMenu, $this->request->getData());

            if ($this->StoresMenus->save($storesMenu)) {
                $this->Flash->success(__('The stores menu has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The stores menu could not be saved. Please, try again.'));
        }

        $storesCourses = $this->StoresMenus->StoresCourses->find('list');

        $this->set(compact('storesMenu', 'storesCourses'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);

        $storesMenu = $this->StoresMenus->get($id);

        if ($this->StoresMenus->delete($storesMenu)) {
            $this->Flash->success(__('A item foi deletado da emenat com sucesso com sucesso.'));
        } else {
            $this->Flash->error(__('Não foi possível deletar o item da ementa. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
