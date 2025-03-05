<?php
$url = $this->request->webroot . 'pages';

if ($role == 'store' && $roleBuilder == 'builder') {
    $url = $this->request->webroot . 'stores-courses/courses';
}
?>

<a href="<?= $url ?>" class="brand-link">
    <img src="<?= $this->request->webroot . 'adminlte/dist/img/BrazzilLogo.png' ?>"
        alt="Brazzil"
        class="brand-image img-circle elevation-3"
        style="opacity: .8">

    <span class="brand-text font-weight-light"><?= $storesPages->logo ?> </span>
</a>