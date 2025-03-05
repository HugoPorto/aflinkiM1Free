<?php

$controller = 'Home';
$controllerUrl = '/pages';
$action = 'index';

if ($this->request->getParam('controller') == 'Pages') {
    $controller = 'Home';
    $controllerUrl = '/pages';
    $action = 'index';
} else if ($this->request->getParam('controller') == 'StoresCourses' && $this->request->getParam('action') == 'index') {
    $controller = 'Cursos';
    $controllerUrl = '/stores-courses';
    $action = 'Todos os Cursos';
} else if ($this->request->getParam('controller') == 'StoresCourses' && $this->request->getParam('action') == 'view') {
    $controller = 'Cursos';
    $controllerUrl = '/stores-courses';
    $action = 'Ver Curso';
} else if ($this->request->getParam('controller') == 'StoresCourses' && $this->request->getParam('action') == 'edit') {
    $controller = 'Cursos';
    $controllerUrl = '/stores-courses';
    $action = 'Editar Curso';
} else if ($this->request->getParam('controller') == 'StoresCourses' && $this->request->getParam('action') == 'add') {
    $controller = 'Cursos';
    $controllerUrl = '/stores-courses';
    $action = 'Adicionar Curso';
} else if ($this->request->getParam('controller') == 'StoresCourses' && $this->request->getParam('action') == 'editPhoto') {
    $controller = 'Cursos';
    $controllerUrl = '/stores-courses';
    $action = 'Editar Foto';
} else if ($this->request->getParam('controller') == 'StoresVideos' && $this->request->getParam('action') == 'index') {
    $controller = 'Aulas';
    $controllerUrl = '/stores-videos';
    $action = 'Todas as Aulas';
} else if ($this->request->getParam('controller') == 'StoresVideos' && $this->request->getParam('action') == 'view') {
    $controller = 'Aulas';
    $controllerUrl = '/stores-videos';
    $action = 'Ver Aula';
} else if ($this->request->getParam('controller') == 'StoresVideos' && $this->request->getParam('action') == 'edit') {
    $controller = 'Aulas';
    $controllerUrl = '/stores-videos';
    $action = 'Editar Aula';
} else if ($this->request->getParam('controller') == 'StoresVideos' && $this->request->getParam('action') == 'add') {
    $controller = 'Aulas';
    $controllerUrl = '/stores-videos';
    $action = 'Adicionar Aula';
} else if ($this->request->getParam('controller') == 'StoresVideos' && $this->request->getParam('action') == 'editPhoto') {
    $controller = 'Aulas';
    $controllerUrl = '/stores-videos';
    $action = 'Editar Foto';
}

?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Painel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $controllerUrl ?>"><?= $controller ?></a></li>
                        <li class="breadcrumb-item active"><?= $action ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>