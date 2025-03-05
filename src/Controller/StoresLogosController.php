<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Filesystem\File;

class StoresLogosController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UploadLogo');
        $this->loadComponent('Base64');
    }

    public function index()
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');
        $storesLogos = $this->paginate($this->StoresLogos);
        $this->set(compact('storesLogos'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');
        $this->viewBuilder()->setLayout('root');
        $logo = $this->StoresLogos->get($id, [
            'contain' => []
        ]);

        $beforeLogo = $logo->logo;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();

            if (!empty($this->request->getData()['logo'][0]['name'])) {
                if ((int) $this->request->getData()['logo'][0]['size'] < 2000000) {
                    $logo = $this->Base64->processMainLogo($this->request->getData());
                    $data['logo'] = $logo;
                    $logo = $this->StoresLogos->patchEntity($logo, $data);
                }
            } else {
                $data['logo'] = '';
            }

            if ($this->StoresLogos->save($logo)) {
                $this->Flash->success(__('Logo salva com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }

            return $this->redirect(['controller' => 'Pages', 'action' => 'error', base64_encode('Erro ao adicionar imagem.')]);
        }

        $this->set(compact('logo'));
    }
}
