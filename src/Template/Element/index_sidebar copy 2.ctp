<div class="sidebar">

    <?php
    $isCompany =  $this->request->getParam('controller') === 'Companys' && $this->request->getParam('action') === 'index';
    $controller =  $this->request->getParam('controller');
    $action =  $this->request->getParam('action');
    $isPages = ($this->request->getParam('controller') === 'Pages' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresProducts' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresCategories' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresDemands' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresItemsDemands' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'LowsProducts' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'LowsProducts' && $this->request->getParam('action') === 'add')
        || ($this->request->getParam('controller') === 'StoresMessages' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresAddress' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresComments' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresBudgets' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'PromptsCategories' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'Prompts' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'Landpages' && $this->request->getParam('action') === 'iframe');
    $isCourses = ($this->request->getParam('controller') === 'StoresCourses' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresVideos' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'CoursesDownloads' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresMenus' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'Slides' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'Codes' && $this->request->getParam('action') === 'index');
    $isFront = ($this->request->getParam('controller') === 'StoresFooters' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresAbouts' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'CoursesHours' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresContacts' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresSliders' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresLogos' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresTitles' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresPartners' && $this->request->getParam('action') === 'index');
    $isSettings = ($this->request->getParam('controller') === 'StoresStripeConfigs' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresSuperpass' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'Configs' && $this->request->getParam('action') === 'view')
        || ($this->request->getParam('controller') === 'StoresTerms' && $this->request->getParam('action') === 'index');
    $isRoot = ($this->request->getParam('controller') === 'Tablesroots' && $this->request->getParam('action') === 'index');
    $isDigitalAreaCourses = ($this->request->getParam('controller') === 'Certificates' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'StoresCourses' && $this->request->getParam('action') === 'courses');
    $isBuilder = ($this->request->getParam('controller') === 'Builder' && $this->request->getParam('action') === 'index')
        || ($this->request->getParam('controller') === 'Builder' && $this->request->getParam('action') === 'requests')
        || ($this->request->getParam('controller') === 'Builder' && $this->request->getParam('action') === 'products')
        || ($this->request->getParam('controller') === 'Builder' && $this->request->getParam('action') === 'myaffiliates')
        || ($this->request->getParam('controller') === 'Disclosurepages' && $this->request->getParam('action') === 'index');
    ?>

    <?php if (($configs->show_type_products == 2 || $configs->show_type_products == 1) && $role != 'root') : ?>
        <?= $this->element('index_user_panel') ?>
    <?php endif; ?>

    <?php if ($username) : ?>
        <?php if ($role == 'storeAdmin') : ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Geral<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">

                                <a href="/stores-demands" class="nav-link ">
                                    <i class="nav-icon fa fa-list-alt text-info"></i>
                                    <p>Pedidos </p>
                                </a>
                            </li>
                            <li class="nav-item">

                                <a href="/stores-items-demands" class="nav-link ">
                                    <i class="nav-icon fa fa-list-alt text-info"></i>
                                    <p>Itens dos Pedidos </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Produtos Digitais<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/stores-courses" class="nav-link ">
                                    <i class="nav-icon fa fa-desktop text-info"></i>
                                    <p>Cursos </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-videos" class="nav-link ">
                                    <i class="nav-icon fa fa-play text-info"></i>
                                    <p>Videos </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/courses-downloads" class="nav-link ">
                                    <i class="nav-icon fa fa-download text-success"></i>
                                    <p>Downloads </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-menus" class="nav-link ">
                                    <i class="nav-icon fa fa-th-list text-info"></i>
                                    <p>Ementas </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/slides" class="nav-link ">
                                    <i class="nav-icon fa fa-square text-info"></i>
                                    <p>Slides </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Front-End<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/stores-footers" class="nav-link ">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p>Rodapé </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-abouts" class="nav-link ">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p>Sobre </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-hours" class="nav-link ">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p>Horários </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-contacts" class="nav-link ">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p>Contatos </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-sliders" class="nav-link ">
                                    <i class="nav-icon fa fa-square text-info"></i>
                                    <p>Banners </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-logos" class="nav-link ">
                                    <i class="nav-icon fa fa-square text-info"></i>
                                    <p>Logo </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-titles" class="nav-link ">
                                    <i class="nav-icon fa fa-globe text-info"></i>
                                    <p>Título Geral </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-partners" class="nav-link ">
                                    <i class="nav-icon fa fa-users text-info"></i>
                                    <p>Parceiros </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Configurações<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/stores-stripe-configs" class="nav-link ">
                                    <i class="nav-icon fas fa-cog text-info"></i>
                                    <p>Configurações Stripe </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-superpass" class="nav-link ">
                                    <i class="nav-icon fas fa-cog text-info"></i>
                                    <p>Superpass </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/configs/view" class="nav-link ">
                                    <i class="nav-icon fas fa-cog text-info"></i>
                                    <p>Configurações Gerais </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/stores-terms" class="nav-link ">
                                    <i class="nav-icon fas fa-cog text-info"></i>
                                    <p>Termos </p>
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
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Painel<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/stores-courses/courses" class="nav-link active">
                                    <i class="nav-icon fas fa-link text-info"></i>
                                    <p>Meus Cursos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/certificates" class="nav-link ">
                                    <i class="nav-icon fas fa-link text-info"></i>
                                    <p>Certificados</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>
    <?php endif; ?>
</div>