<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\MailerAwareTrait;

class SitesController extends AppController
{
    use MailerAwareTrait;

    public function initialize()
    {
        parent::initialize();

        $this->Auth->allow(
            [
                'one'
            ]
        );
    }

    public function one() {}
}
