<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class StoresCartsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
    }
    public function index()
    {
        $this->hasPermission('store');
        $this->paginate = [
            'contain' => ['StoresProducts', 'Users']
        ];
        $storesCarts = $this->paginate($this->StoresCarts);
        $this->set(compact('storesCarts'));
    }
    public function view($id = null)
    {
        $this->hasPermission('store');
        $storesCart = $this->StoresCarts->get($id, [
            'contain' => ['StoresProducts', 'Users']
        ]);
        $this->set('storesCart', $storesCart);
    }
    private function validateQuantity($request)
    {
        if ($request['quantity'] === '0') {
            $this->Flash->error(__('Você não pode adicionar um item ao carrinho com a quantidade 0.'));
            return false;
        } else {
            return true;
        }
    }
    public function add()
    {
        $this->hasPermission('store');
        $this->loadModel('Configs');
        $storesCart = $this->StoresCarts->newEntity();
        $configs = $this->Configs->find('all')->first();
        // $redirect = $this->verifyCourse($this->request);
        // if ($redirect) {
        //     return $redirect;
        // }
        if ($this->request->is('post')) {
            if ($configs->show_type_products === 1) {
                $storesCart = $this->StoresCarts->patchEntity($storesCart, $this->request->getData());
                if ($this->validateQuantity($this->request->getData())) {
                    if ($this->StoresCarts->save($storesCart)) {
                        return $this->redirect(['controller' => 'homes', 'action' => 'storeCart']);
                    }
                    return $this->redirect(
                        [
                            'controller' => 'homes',
                            'action' => 'error',
                            base64_encode('Erro ao adicionar no carrinho.')
                        ]
                    );
                } else {
                    $this->redirectReferer();
                }
            } elseif ($configs->show_type_products === 2) {
                $request = $this->request->getData();
                $request['quantity'] = 1;
                $request['users_id'] = $this->Auth->user()['id'];
                $request['type_product'] = 2;
                $storesCart = $this->StoresCarts->patchEntity($storesCart, $request);
                if ($this->StoresCarts->save($storesCart)) {
                    return $this->redirect(['controller' => 'homes', 'action' => 'storeCartDigital']);
                }
                return $this->redirect(
                    [
                        'controller' => 'homes',
                        'action' => 'error',
                        base64_encode('Erro ao adicionar no carrinho.')
                    ]
                );
            }
        }
        $this->redirectReferer();
    }
    public function delete($id = null)
    {
        $this->hasPermission('store');
        $this->request->allowMethod(['post', 'delete']);
        $storesCart = $this->StoresCarts->get($id);
        if ($this->StoresCarts->delete($storesCart)) {
            $this->Flash->success(__('The stores cart has been deleted.'));
        } else {
            $this->Flash->error(__('The stores cart could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    private function verifyCourse($request)
    {
        $connection = ConnectionManager::get('default');
        $sql = 'select c.id, c.course as curso, c.photo
                from stores_courses c
                inner join stores_demands md
                inner join users u on md.users_id = u.id
                inner join stores_items_demands d on c.id = d.stores_courses_id and md.id = d.stores_demands_id
                where u.id =' . $this->Auth->user()['id'];
        $courses_user = $connection->execute($sql)->fetchAll();
        foreach ($courses_user as $key => $value) {
            if ($request->getData()['stores_courses_id'] == $value[0]) {
                return $this->redirect($this->referer());
            }
        }
    }
}
