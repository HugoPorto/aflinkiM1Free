<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

class StoresSlidersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UploadSlider');
    }

    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        $storesSliders = $this->StoresSliders->find('all');

        $this->set(compact('storesSliders', 'loginMenu'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $storesSlider = $this->StoresSliders->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('storesSlider', $storesSlider);
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $storesSlider = $this->StoresSliders->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();

            if (!empty($this->request->getData()['slider'][0]['name'])) {
                $this->UploadSlider->upload($this->request->getData()['slider'], $this->request->getData()['galerys_id']);
                $data['slider'] = $this->request->getData()['slider']['0']['name'];
            }

            $storesSlider = $this->StoresSliders->patchEntity($storesSlider, $data);

            if ($this->StoresSliders->save($storesSlider)) {
                $this->Flash->success(__('The stores slider has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stores slider could not be saved. Please, try again.'));
        }
        $users = $this->StoresSliders->Users->find('list', ['limit' => 200]);
        $this->set(compact('storesSlider', 'users'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $loginMenu = $this->loginMenuLoad();

        $storesSlider = $this->StoresSliders->get($id, [
            'contain' => []
        ]);

        $beforeSlider = $storesSlider->slider;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            $this->log($this->request->getData(), 'debug');

            if (!empty($data['slider'][0]['name']) && $data['slider'][0]['error'] === UPLOAD_ERR_OK) {
                $this->UploadSlider->upload($this->request->getData()['slider'], $this->request->getData()['galerys_id'], $id);

                if ((int) $this->request->getData()['slider'][0]['size'] < 6000000) {
                    $fileToDelete = WWW_ROOT . 'img' . DS . 'galerys' . DS . '12' . DS . $beforeSlider;

                    $file = new File($fileToDelete);

                    $file->delete();

                    $file->close();

                    $session = $this->request->getSession();

                    $data['slider'] = $session->read('fileImageName');

                    $session->delete('fileImageName');
                }
            } else {
                $data['slider'] = $beforeSlider;
            }

            $storesSlider = $this->StoresSliders->patchEntity($storesSlider, $data);

            if ($this->StoresSliders->save($storesSlider)) {
                $this->Flash->success(__('O Banner foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('O Banner não pode ser salvo. Por favor, tente novamente.'));
        }

        $this->set(compact('storesSlider', 'loginMenu'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);
        $storesSlider = $this->StoresSliders->get($id);
        if ($this->StoresSliders->delete($storesSlider)) {
            $this->Flash->success(__('The stores slider has been deleted.'));
        } else {
            $this->Flash->error(__('The stores slider could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
