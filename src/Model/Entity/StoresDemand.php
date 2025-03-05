<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class StoresDemand extends Entity
{
    protected $_accessible = [
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'status' => true,
        'value' => true,
        'cpf' => true,
        'user' => true
    ];
}
