<?php

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\I18n\Time;

class ToolsHelper extends Helper
{
    public $helpers = ['Html'];

    public function makeEdit($title, $url)
    {
        $link = $this->Html->link($title, $url, ['class' => 'edit']);

        return '<div class="editOuter">' . $link . '</div>';
    }

    public function formatDate($time = null)
    {
        return $time->format('d/m/Y');
    }

    public function encryptParam($string)
    {
        $secret_key = 'my_simple_secret_key';

        $secret_iv = 'my_simple_secret_iv';

        $output = false;

        $encrypt_method = "AES-256-CBC";

        $key = hash('sha256', $secret_key);

        $iv = substr(hash('sha256', $secret_iv), 0, 16);

        $output = base64_encode(openssl_encrypt($string, $encrypt_method, $key, 0, $iv));

        return $output;
    }
}
