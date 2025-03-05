<?php

namespace App\Controller;

use App\Controller\AppController;

class StoresContactsController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        $this->paginate = [
            'contain' => ['Users']
        ];
        $storesContacts = $this->paginate($this->StoresContacts);

        $this->set(compact('storesContacts', 'loginMenu'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        $storesContact = $this->StoresContacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            if (!array_key_exists("infoactive", $data)) {
                $data['infoactive'] = '0';
            } else {
                $data['infoactive'] = '1';
            }

            // $this->log($data, 'debug');

            $storesContact = $this->StoresContacts->patchEntity($storesContact, $data);
            if ($this->StoresContacts->save($storesContact)) {
                $this->Flash->success(__('The stores contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores contact could not be saved. Please, try again.'));
        }

        $this->set(compact('storesContact', 'loginMenu'));
    }
}
