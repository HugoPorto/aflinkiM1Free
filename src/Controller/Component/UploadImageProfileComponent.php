<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\Network\Exception\InternalErrorException;
use Cake\Utility\Text;
use Cake\ORM\TableRegistry;

class UploadImageProfileComponent extends Component
{
    public $max_files = 3;
    public function upload($data, $galery, $user)
    {
        if (count($data) > $this->max_files) {
            $this->_registry->getController()->Flash->error('Limite excedido');
            return $this->_registry->getController()->redirect(['controller' => 'imageProfiles', 'action' => 'add']);
        }

        foreach ($data as $file) {
            $filename = $file['name'];
            $file_tmp_name = $file['tmp_name'];
            $file_ext = substr(strchr($filename, '.'), 1);
            $dir = WWW_ROOT . 'img' . DS . 'galerys' . DS . $galery;
            $type_allowed = array('png', 'jpg', 'jpeg');

            if (!in_array($file_ext, $type_allowed)) {
                $this->_registry->getController()->Flash->error('O tipo não é permitido: "' . $file['type'] . '"');
                return $this->_registry->getController()->redirect(['action' => 'add']);
            } elseif (is_uploaded_file($file_tmp_name)) {
                $path = $file_tmp_name;
                $data = file_get_contents($path);
                $base64 = base64_encode($data);
                $filename = Text::uuid() . '.' . $file_ext;
                $file_db = TableRegistry::get('ImageProfiles');
                $entity = $file_db->newEntity();
                $entity->image = $filename;
                $entity->galerys_id = $galery;
                $entity->users_id = $user;
                $entity->photo = $base64;
                $file_db->save($entity);
                move_uploaded_file($file_tmp_name, $dir . DS . $filename);
            } else {
                $this->_registry->getController()->Flash->error(__('A imagem não pode ser salva. Por favor tente novamente.'));
                return $this->_registry->getController()->redirect(['action' => 'index']);
            }
        }

        $this->_registry->getController()->Flash->success(__('A imagem foi salva com sucesso'));
        return $this->_registry->getController()->redirect(
            [
                'controller' => 'users',
                'action' => 'profile'
            ]
        );
    }
}
