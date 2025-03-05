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
                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false">

                    <li class="nav-item <?= $isPages ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Geral<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                <?php if ($indexSidebar->role->role === 'storeAdmin') : ?>
                                    <?php if ($indexSidebar->category_sidebar->category === 'general') : ?>
                                        <li class="nav-item">

                                            <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>"
                                                class="nav-link <?= $indexSidebar->controller == $controller && $indexSidebar->action == $action ? 'active' : '' ?>">
                                                <i class="<?= $indexSidebar->icon ?>"></i>
                                                <p><?= $indexSidebar->sidebar ?> <?= $indexSidebar->info ?></p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li class="nav-item <?= $isCourses ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Produtos Digitais<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                <?php if ($indexSidebar->role->role === 'storeAdmin') : ?>
                                    <?php if ($indexSidebar->category_sidebar->category === 'digital products') : ?>
                                        <li class="nav-item">
                                            <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>"
                                                class="nav-link <?= $indexSidebar->controller == $controller && $indexSidebar->action == $action ? 'active' : '' ?>">
                                                <i class="<?= $indexSidebar->icon ?>"></i>
                                                <p><?= $indexSidebar->sidebar ?> <?= $indexSidebar->info ?></p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li class="nav-item <?= $isFront ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>Front-End<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                <?php if ($indexSidebar->role->role === 'storeAdmin') : ?>
                                    <?php if ($indexSidebar->category_sidebar->category === 'front') : ?>
                                        <li class="nav-item">
                                            <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>"
                                                class="nav-link <?= $indexSidebar->controller == $controller && $indexSidebar->action == $action ? 'active' : '' ?>">
                                                <i class="<?= $indexSidebar->icon ?>"></i>
                                                <p><?= $indexSidebar->sidebar ?> <?= $indexSidebar->info ?></p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <li class="nav-item <?= $isSettings ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Configurações<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                <?php if ($indexSidebar->role->role === 'storeAdmin') : ?>
                                    <?php if ($indexSidebar->category_sidebar->category === 'settings') : ?>
                                        <li class="nav-item">
                                            <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>"
                                                class="nav-link <?= $indexSidebar->controller == $controller && $indexSidebar->action == $action ? 'active' : '' ?>">
                                                <i class="<?= $indexSidebar->icon ?>"></i>
                                                <p><?= $indexSidebar->sidebar ?> <?= $indexSidebar->info ?></p>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                </ul>

            <?php elseif ($role == 'store' && $roleBuilder == null) : ?>
                <?php if ($configs->show_type_products === 2) : ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column"
                            data-widget="treeview"
                            role="menu"
                            data-accordion="false">
                            <li class="nav-item <?= $isDigitalAreaCourses ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Painel<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                        <?php if ($indexSidebar->role->role === 'store') : ?>
                                            <?php if ($indexSidebar->category_sidebar->category === 'courses') : ?>
                                                <li class="nav-item">
                                                    <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>"
                                                        class="nav-link <?= $indexSidebar->controller == $controller && $indexSidebar->action == $action ? 'active' : '' ?>">
                                                        <i class="<?= $indexSidebar->icon ?>"></i>
                                                        <p><?= $indexSidebar->sidebar ?></p>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>

            <?php elseif ($role == 'store' && $roleBuilder == 'builder') : ?>
                <?php if ($configs->show_type_products === 2) : ?>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column"
                            data-widget="treeview"
                            role="menu"
                            data-accordion="false">
                            <li class="nav-item <?= $isDigitalAreaCourses ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Painel<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                        <?php if ($indexSidebar->role->role === 'store') : ?>
                                            <?php if ($indexSidebar->category_sidebar->category === 'courses') : ?>
                                                <li class="nav-item">
                                                    <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>"
                                                        class="nav-link <?= $indexSidebar->controller == $controller && $indexSidebar->action == $action ? 'active' : '' ?>">
                                                        <i class="<?= $indexSidebar->icon ?>"></i>
                                                        <p><?= $indexSidebar->sidebar ?></p>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="nav-item <?= $isBuilder ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-tools"></i>
                                    <p>Builder<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                        <?php if ($indexSidebar->role->role === 'store' && $indexSidebar->role->role_two === 'builder') : ?>
                                            <?php if ($indexSidebar->category_sidebar->category === 'builder') : ?>
                                                <li class="nav-item">
                                                    <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>"
                                                        class="nav-link <?= $indexSidebar->controller == $controller && $indexSidebar->action == $action ? 'active' : '' ?>">
                                                        <i class="<?= $indexSidebar->icon ?>"></i>
                                                        <p><?= $indexSidebar->sidebar ?></p>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                <?php endif; ?>

            <?php elseif ($role == 'root') : ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column"
                        data-widget="treeview"
                        role="menu"
                        data-accordion="false">
                        <li class="nav-item <?= $isRoot ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-building"></i>
                                <p>Root<i class="fas fa-angle-left right"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php foreach ($indexSidebars as $indexSidebar) : ?>
                                    <?php if ($indexSidebar->role->role === 'root') : ?>
                                        <?php if ($indexSidebar->category_sidebar->category === 'general') : ?>
                                            <li class="nav-item">
                                                <a href="<?= $this->request->base ?><?= $indexSidebar->url ?>"
                                                    class="nav-link <?= $indexSidebar->controller == $controller && $indexSidebar->action == $action ? 'active' : '' ?>">
                                                    <i class="<?= $indexSidebar->icon ?>"></i>
                                                    <p><?= $indexSidebar->sidebar ?></p>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>

        <?php else : ?>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column"
                    data-widget="treeview"
                    role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="<?php $this->request->base ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Home</p>
                        </a>
                    </li>
                </ul>
            </nav>
        <?php endif; ?>

</div>