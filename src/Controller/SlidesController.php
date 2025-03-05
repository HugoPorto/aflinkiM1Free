<?php

namespace App\Controller;

use App\Controller\AppController;

class SlidesController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $slides = $this->Slides->find('all', [
            'contain' => [
                'StoresCourses',
                'Users'
            ]
        ]);

        $this->set(compact('slides'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $slide = $this->Slides->get($id, [
            'contain' => ['StoresCourses', 'Users']
        ]);

        $this->set('slide', $slide);
    }

    public function add()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $slide = $this->Slides->newEntity();

        if ($this->request->is('post')) {
            $slide = $this->Slides->patchEntity($slide, $this->request->getData());

            if ($this->Slides->save($slide)) {
                $this->Flash->success(__('The slide has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The slide could not be saved. Please, try again.'));
        }

        $storesCourses = $this->Slides->StoresCourses->find('list');

        $this->set(compact('slide', 'storesCourses'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $slide = $this->Slides->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $slide = $this->Slides->patchEntity($slide, $this->request->getData());

            if ($this->Slides->save($slide)) {
                $this->Flash->success(__('O slide foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Não foi possível salvar o slide. Por favor, tente novamente.'));
        }

        $storesCourses = $this->Slides->StoresCourses->find('list');

        $this->set(compact('slide', 'storesCourses'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);

        $slide = $this->Slides->get($id);

        if ($this->Slides->delete($slide)) {
            $this->Flash->success(__('The slide has been deleted.'));
        } else {
            $this->Flash->error(__('The slide could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
