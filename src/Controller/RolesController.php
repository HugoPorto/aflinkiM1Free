<?php

namespace App\Controller;

use App\Controller\AppController;

class RolesController extends AppController
{
    public function index()
    {
        $this->hasPermission('root');

        $this->viewBuilder()->setLayout('root');

        $roles = $this->paginate($this->Roles);

        $this->set(compact('roles'));
    }

    public function view($id = null)
    {
        $this->hasPermission('root');

        $this->viewBuilder()->setLayout('root');

        $role = $this->Roles->get($id, [
            'contain' => []
        ]);

        $this->set('role', $role);
    }

    public function add()
    {
        $this->hasPermission('root');

        $this->viewBuilder()->setLayout('root');

        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    public function edit($id = null)
    {
        $this->hasPermission('root');

        $this->viewBuilder()->setLayout('root');

        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }
}
