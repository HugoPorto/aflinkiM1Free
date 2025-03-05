<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

class CoursesDownload extends Entity
{
    protected $_accessible = [
        'link' => true,
        'stores_courses_id' => true,
        'stores_videos_id' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'users_id' => true,
        'stores_course' => true,
        'stores_video' => true,
        'user' => true
    ];
}
