<?php $preferredLanguage = $this->request->getCookie('preferredLanguage'); ?>
<?php if ($role === 'root') : ?>

    <body class="dark-mode hold-transition sidebar-mini layout-fixed layout-navbar-fixed" id="main">
    <?php else : ?>

        <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" id="main">
        <?php endif; ?>
        <div class="wrapper">
            <div class="preloader flex-column justify-content-center align-items-center"><img class="animation__shake" <?= $storesLogo ?> alt="Logomarca" height="60"></div>

            <?php if ($role === 'root' && $roleBuilder  == null) : ?>
                <nav class="main-header navbar-dark navbar navbar-expand">
                <?php elseif ($role === 'storeAdmin' && $roleBuilder  === 'admin') : ?>
                    <nav class="main-header navbar navbar-expand navbar-light bg-info">
                    <?php elseif ($role === 'store' && $roleBuilder  == null) : ?>
                        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                        <?php elseif ($role === 'store' && $roleBuilder  == 'builder') : ?>
                            <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-warning">
                            <?php else : ?>
                                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                                <?php endif; ?>
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                                    </li>
                                    <?php if ($role != 'root') : ?>
                                        <li class="nav-item d-none d-sm-inline-block">
                                            <a href="<?= $this->request->base ?>/" target="_blank" class="btn btn-dark"><?= __("Visualizar Site") ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <li class="nav-item d-none d-sm-inline-block">
                                        <?php if ($role === 'store') : ?>
                                            <a href="<?= $this->request->base ?>/stores-courses/courses" class="nav-link">Home</a>
                                        <?php elseif ($role === 'root') : ?>
                                            <a href="<?= $this->request->base ?>/tablesroots" class="nav-link">Home</a>
                                        <?php elseif ($role === 'common') : ?>
                                            <a href="<?= $this->request->base ?>/homes/videos" class="nav-link">Home</a>
                                        <?php else : ?>
                                            <a href="<?= $this->request->base ?>/pages" class="nav-link">Home</a>
                                        <?php endif; ?>
                                    </li>
                                    <li class="nav-item d-none d-sm-inline-block" id="perfil">
                                        <?php if ($role === 'store') : ?>
                                            <a href="<?= $this->request->base ?>/users/profile" class="nav-link"><?= __("Perfil") ?></a>
                                        <?php endif; ?>
                                    </li>
                                    <li class="nav-item d-none d-sm-inline-block">
                                        <?php if ($username) : ?>
                                            <?php if ($role === 'store' || $role === 'storeAdmin' || $role === 'root') : ?>
                                                <?php echo $this->Html->link(__('Logout'), ['controller' => 'users', 'action' => 'logout'], ['class' => 'btn btn-danger']); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                                <ul class="navbar-nav ml-auto">
                                    <?php if ($preferredLanguage === 'en_US') : ?>
                                        <li id="eua"><img width="32px" style="margin-left: 10px; cursor: pointer;" src="<?= $this->request->webroot . 'img/american.png'; ?>"></li>
                                        <li id="brazil"><img width="32px" style="margin-left: 10px; cursor: pointer;" src="<?= $this->request->webroot . 'img/brazil_inative.png'; ?>"></li>
                                    <?php else : ?>
                                        <li id="eua"><img width="32px" style="margin-left: 10px; cursor: pointer;" src="<?= $this->request->webroot . 'img/american_inative.png'; ?>"></li>
                                        <li id="brazil"><img width="32px" style="margin-left: 10px; cursor: pointer;" src="<?= $this->request->webroot . 'img/brazil.png'; ?>"></li>
                                    <?php endif; ?>
                                </ul>
                                <?php echo $this->element('index_nav_right'); ?>