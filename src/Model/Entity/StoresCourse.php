<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class StoresCourse extends Entity
{
    protected $_accessible = [
        'course' => true,
        'created' => true,
        'modified' => true,
        'autor' => true,
        'theme' => true,
        'users_id' => true,
        'photo' => true,
        'price' => true,
        'description' => true,
        'status' => true,
        'user' => true,
        'digitals_categories_id' => true,
        'digitals_category' => true,
        'subtitle' => true,
    ];
}
