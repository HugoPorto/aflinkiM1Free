<?php

namespace App\Controller;


class PaymentController extends AppController
{
    public function pay()
    {
        $this->hasPermission('store');

        $this->loadModel('Configs');

        $configs = $this->Configs->find('all')->first();

        $total = $this->totalCalculateDigital();

        if ($total <= 0) {
            return $this->redirect(['controller' => 'homes', 'action' => 'store']);
        }

        $this->set(compact("total"));
    }

    public function payment()
    {
        $this->hasPermission('store');

        $this->loadModel('Configs');

        $total = $this->totalCalculateDigital();

        $demandId = $this->saveDemand($total);

        $this->saveItensDemandsDigital($demandId);

        $this->cleanCart();

        return $this->redirect(['controller' => 'homes', 'action' => 'storeConfirm', $demandId]);
    }

    private function saveItensDemandsDigital($demandId = null)
    {
        $this->hasPermission('store');
        $this->loadModel('StoresCarts');
        $this->loadModel('StoresItemsDemands');
        $storesCarts = $this->StoresCarts->find(
            'all',
            [
                'conditions' =>
                [
                    'StoresCarts.users_id =' => $this->Auth->user()['id'],
                    'StoresCarts.type_product =' => 2,
                ]
            ]
        );
        $itensDemand = [];
        foreach ($storesCarts as $storesCart) {
            $itensDemand = [
                'stores_demands_id' => $demandId,
                'stores_courses_id' => $storesCart->stores_courses_id,
                'quantity' => $storesCart->quantity
            ];
            $storesItemsDemand = $this->StoresItemsDemands->newEntity();
            $storesItemsDemand = $this->StoresItemsDemands->patchEntity($storesItemsDemand, $itensDemand);
            $this->StoresItemsDemands->save($storesItemsDemand);
        }
    }

    private function saveDemand($total)
    {
        $this->hasPermission('store');
        $this->loadModel('Configs');

        $configs = $this->Configs->find('all')->first();
        if ($configs->show_type_products === 2) {
            $demand = [
                'users_id' => $this->Auth->user()['id'],
                'status' => 1,
                'value' => $total,
                'cpf' => str_replace(['.', '-', ' '], '', $this->request->getSession()->read('cpf'))
            ];
        } else {
            $demand = [
                'users_id' => $this->Auth->user()['id'],
                'status' => 0,
                'value' => $total,
                'cpf' => str_replace(['.', '-', ' '], '', $this->request->getSession()->read('cpf'))
            ];
        }
        $this->loadModel('StoresDemands');
        $storesDemand = $this->StoresDemands->newEntity();
        $storesDemand = $this->StoresDemands->patchEntity($storesDemand, $demand);
        $this->StoresDemands->save($storesDemand);
        $this->saveCpf();
        $this->removePessoalDataSession();
        return $storesDemand->id;
    }

    private function cleanCart()
    {
        $this->hasPermission('store');
        $this->loadModel('StoresCarts');
        $this->StoresCarts->deleteAll(['id >' => 0]);
    }

    private function totalCalculateDigital()
    {
        $this->hasPermission('store');
        $this->loadModel('StoresCarts');

        $storesCarts = $this->StoresCarts->find(
            'all',
            [
                'contain' => ['StoresCourses'],
                'conditions' => [
                    'StoresCarts.users_id =' => $this->Auth->user()['id'],
                    'StoresCarts.type_product =' => 2,
                ]
            ]
        );

        $total = 0;

        foreach ($storesCarts as $storesCart) {
            $total = $total + ($storesCart->stores_course->price * $storesCart->quantity);
        }

        return $total;
    }

    private function saveCpf()
    {
        $this->loadModel('Cpfs');
        $myRegister = $this->Cpfs->find('all', [
            'conditions' => [
                'Cpfs.users_id =' => $this->Auth->user()['id']
            ]
        ]);
        if (empty($myRegister->toArray())) {
            $cpf = $this->Cpfs->newEntity();
            $data = [];
            $data['users_id'] = $this->Auth->user()['id'];
            $data['cpf'] = $this->request->getSession()->read('cpf');
            $cpf = $this->Cpfs->patchEntity($cpf, $data);
            $this->Cpfs->save($cpf);
        }
    }
}
