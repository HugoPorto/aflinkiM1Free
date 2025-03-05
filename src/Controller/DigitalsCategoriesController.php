<?php

namespace App\Controller;

use App\Controller\AppController;

class DigitalsCategoriesController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        $this->paginate = [
            'contain' => ['Users']
        ];
        $digitalsCategories = $this->paginate($this->DigitalsCategories);

        $this->set(compact('digitalsCategories'));
    }


    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        $digitalsCategory = $this->DigitalsCategories->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('digitalsCategory', $digitalsCategory);
    }


    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        $digitalsCategory = $this->DigitalsCategories->newEntity();

        if ($this->request->is('post')) {
            $digitalsCategory = $this->DigitalsCategories->patchEntity($digitalsCategory, $this->request->getData());

            if ($this->DigitalsCategories->save($digitalsCategory)) {
                $this->Flash->success(__('A categoria foi salva com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('A categoria não pode ser ssalva. Por favor, tente novamente.'));
        }

        $users = $this->DigitalsCategories->Users->find('list', ['limit' => 200]);

        $this->set(compact('digitalsCategory', 'users'));
    }


    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        $digitalsCategory = $this->DigitalsCategories->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $digitalsCategory = $this->DigitalsCategories->patchEntity($digitalsCategory, $this->request->getData());

            if ($this->DigitalsCategories->save($digitalsCategory)) {
                $this->Flash->success(__('The digitals category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The digitals category could not be saved. Please, try again.'));
        }

        $users = $this->DigitalsCategories->Users->find('list', ['limit' => 200]);

        $this->set(compact('digitalsCategory', 'users'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $digitalsCategory = $this->DigitalsCategories->get($id);
        if ($this->DigitalsCategories->delete($digitalsCategory)) {
            $this->Flash->success(__('The digitals category has been deleted.'));
        } else {
            $this->Flash->error(__('The digitals category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
