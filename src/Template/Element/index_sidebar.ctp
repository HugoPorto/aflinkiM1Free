<div class="sidebar">

    <?php
    $isCompany =  $this->request->getParam('controller') === 'Companys' && $this->request->getParam('action') === 'index';
    $controller =  $this->request->getParam('controller');
    $action =  $this->request->getParam('action');
    ?>

    <?php if (($configs->show_type_products == 2 || $configs->show_type_products == 1) && $role != 'root') : ?>
        <?= $this->element('index_user_panel') ?>
    <?php endif; ?>

    <?php if ($username) : ?>
        <?php if ($role == 'storeAdmin') : ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item <?= $controller === 'StoresDemands' || $controller === 'StoresItemsDemands' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p><?= __('Geral') ?><i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">

                                <a href="/stores-demands" class="nav-link <?= $controller === 'StoresDemands' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-list-alt text-info"></i>
                                    <p><?= __('Pedidos') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">

                                <a href="/stores-items-demands" class="nav-link <?= $controller === 'StoresItemsDemands' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-list-alt text-info"></i>
                                    <p><?= __('Itens dos Pedidos') ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?= $controller === 'StoresCourses' || $controller === 'StoresVideos' || $controller === 'CoursesDownloads' || $controller === 'StoresMenus' || $controller === 'Slides' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p><?= __('Produtos Digitais') ?><i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/stores-courses" class="nav-link <?= $controller === 'StoresCourses' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-desktop text-info"></i>
                                    <p><?= __('Cursos') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-videos" class="nav-link <?= $controller === 'StoresVideos' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-play text-info"></i>
                                    <p><?= __('Videos') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/courses-downloads" class="nav-link <?= $controller === 'CoursesDownloads' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-download text-success"></i>
                                    <p><?= __('Downloads') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-menus" class="nav-link <?= $controller === 'StoresMenus' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-th-list text-info"></i>
                                    <p><?= __('Ementas') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/slides" class="nav-link <?= $controller === 'Slides' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-square text-info"></i>
                                    <p><?= __('Slides') ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?= $controller === 'StoresFooters' || $controller === 'StoresAbouts' || $controller === 'StoresHours' || $controller === 'StoresContacts' || $controller === 'StoresSliders' || $controller === 'StoresLogos' || $controller === 'StoresTitles' || $controller === 'StoresPartners' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p><?= __('Front-End') ?><i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/stores-footers" class="nav-link <?= $controller === 'StoresFooters' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p><?= __('Rodapé') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-abouts" class="nav-link <?= $controller === 'StoresAbouts' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p><?= __('Sobre') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-hours" class="nav-link <?= $controller === 'StoresHours' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p><?= __('Horários') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-contacts" class="nav-link <?= $controller === 'StoresContacts' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p><?= __('Contatos') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-sliders" class="nav-link <?= $controller === 'StoresSliders' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-square text-info"></i>
                                    <p><?= __('Banners') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-logos" class="nav-link <?= $controller === 'StoresLogos' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-square text-info"></i>
                                    <p><?= __('Logo') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-titles" class="nav-link <?= $controller === 'StoresTitles' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p><?= __('Título Geral') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-partners" class="nav-link <?= $controller === 'StoresPartners' ? 'active' : '' ?>">
                                    <i class="nav-icon fa fa-users text-info"></i>
                                    <p><?= __('Parceiros') ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item <?= $controller === 'StoresStripeConfigs' || $controller === 'StoresSuperpass' || $controller === 'Configs' || $controller === 'StoresTerms' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p><?= __('Configurações') ?><i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">


















                            <li class="nav-item">
                                <a href="/stores-terms" class="nav-link <?= $controller === 'StoresTerms' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-cog text-info"></i>
                                    <p><?= __('Termos') ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
        <?php if ($role == 'store') : ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item <?= $controller === 'StoresCourses' || $controller === 'Certificates' ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p><?= __('Painel') ?><i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/stores-courses/courses" class="nav-link <?= $controller === 'StoresCourses' && $action === 'courses' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-link text-info"></i>
                                    <p><?= __('Meus Cursos') ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/certificates" class="nav-link <?= $controller === 'Certificates' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-link text-info"></i>
                                    <p><?= __('Certificados') ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
    <?php endif; ?>
</div>