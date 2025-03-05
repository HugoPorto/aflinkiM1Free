<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;
// use Cake\Log\Log;

class UploadBannerDisclosureComponent extends Component
{
    public function upload($file, $new_filename)
    {
        // Log::debug($file);

        $filename = $file[0]['name'];

        $file_tmp_name = $file[0]['tmp_name'];

        $file_ext = substr(strchr($filename, '.'), 1);

        $dir = WWW_ROOT . 'img' . DS . 'galerys' . DS . 17;

        $type_allowed = ['png', 'jpg', 'jpeg'];

        if (!in_array($file_ext, $type_allowed)) {
            $this->_registry->getController()->Flash->error('O tipo não é permitido: "' . $file['type'] . '"');
            return $this->_registry->getController()->redirect(['action' => 'add']);
        }

        if (is_uploaded_file($file_tmp_name)) {

            if (!is_dir($dir)) {
                mkdir($dir, 0755, true);
            }

            if (move_uploaded_file($file_tmp_name, $dir . DS . $new_filename)) {
                $this->_registry->getController()->Flash->success(__('A imagem foi salva com sucesso'));
            } else {
                $this->_registry->getController()->Flash->error(__('A imagem não pode ser salva. Por favor, tente novamente.'));
            }

            return $new_filename;
        } else {
            $this->_registry->getController()->Flash->error(__('A imagem não foi enviada corretamente.'));
        }
    }
}
