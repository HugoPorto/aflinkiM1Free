<?php

namespace App\Controller;

use App\Controller\AppController;

class CoursesDownloadsController extends AppController
{
    public function index()
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $coursesDownloads = $this->CoursesDownloads->find('all', [
            'contain' => [
                'StoresCourses',
                'StoresVideos',
                'Users'
            ]
        ]);

        $this->set(compact('coursesDownloads'));
    }

    public function view($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $coursesDownload = $this->CoursesDownloads->get($id, [
            'contain' => ['StoresCourses', 'StoresVideos']
        ]);

        $this->set('coursesDownload', $coursesDownload);
    }

    public function add($idVideo = null, $idCourse = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $coursesDownload = $this->CoursesDownloads->newEntity();

        if ($this->request->is('post')) {
            $coursesDownload = $this->CoursesDownloads->patchEntity($coursesDownload, $this->request->getData());

            if ($this->CoursesDownloads->save($coursesDownload)) {
                $this->Flash->success(__('The courses download has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The courses download could not be saved. Please, try again.'));
        }

        $storesCourses = $this->CoursesDownloads->StoresCourses->find('list', ['limit' => 200]);

        $storesVideos = $this->CoursesDownloads->StoresVideos->find('list', ['limit' => 200]);

        $this->set(compact('coursesDownload', 'storesCourses', 'storesVideos'));
    }

    public function addFast($idVideo = null, $idCourse = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $coursesDownload = $this->CoursesDownloads->newEntity();

        if ($this->request->is('post')) {
            $coursesDownload = $this->CoursesDownloads->patchEntity($coursesDownload, $this->request->getData());

            if ($this->CoursesDownloads->save($coursesDownload)) {
                $this->Flash->success(__('The courses download has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The courses download could not be saved. Please, try again.'));
        }

        $storesCourse = $this->CoursesDownloads->StoresCourses->find(
            'all',
            [
                'conditions' => [
                    'StoresCourses.id =' => $idCourse
                ]
            ]
        )->first();

        $storesVideo = $this->CoursesDownloads->StoresVideos->find(
            'all',
            [
                'conditions' => [
                    'StoresVideos.id =' => $idVideo
                ]
            ]
        )->first();

        $this->set(compact(
            [
                'coursesDownload',
                'storesCourse',
                'storesVideo',
            ]
        ));
    }

    public function edit($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->viewBuilder()->setLayout('root');

        $coursesDownload = $this->CoursesDownloads->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $coursesDownload = $this->CoursesDownloads->patchEntity($coursesDownload, $this->request->getData());

            if ($this->CoursesDownloads->save($coursesDownload)) {
                $this->Flash->success(__('The courses download has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The courses download could not be saved. Please, try again.'));
        }

        $storesCourses = $this->CoursesDownloads->StoresCourses->find('list', ['limit' => 200]);

        $storesVideos = $this->CoursesDownloads->StoresVideos->find('list', ['limit' => 200]);

        $users = $this->CoursesDownloads->Users->find('list', ['limit' => 200]);

        $this->set(compact('coursesDownload', 'storesCourses', 'storesVideos', 'users'));
    }

    public function delete($id = null)
    {
        $this->hasPermission('storeAdmin');

        $this->request->allowMethod(['post', 'delete']);

        $coursesDownload = $this->CoursesDownloads->get($id);

        if ($this->CoursesDownloads->delete($coursesDownload)) {
            $this->Flash->success(__('The courses download has been deleted.'));
        } else {
            $this->Flash->error(__('The courses download could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
