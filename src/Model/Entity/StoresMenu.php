<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class StoresMenu extends Entity
{
    protected $_accessible = [
        'menu' => true,
        'stores_courses_id' => true,
        'users_id' => true,
        'created' => true,
        'modified' => true,
        'stores_course' => true,
        'user' => true
    ];
}
