<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

class SuperpassComponent extends Component
{
    public function find($pass)
    {
        $storesSuperpass = TableRegistry::get('StoresSuperpass');

        $storesSuperpass = $storesSuperpass->find(
            'all',
            [
                'conditions' =>
                    [
                        'StoresSuperpass.superpass =' => $pass
                    ]
            ]
        )->first();

        return $storesSuperpass;
    }
}
