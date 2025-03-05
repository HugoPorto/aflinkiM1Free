<?php $preferredLanguage = $this->request->getCookie('preferredLanguage'); ?>
<header id="pageTop" class="header">
    <nav class="navbar navbar-expand-md main-nav">
        <div class=" container">
            <button
                class="navbar-toggler  navbar-toggler-right"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="burger-menu icon-toggle">
                    <i class="fa fa-bars"></i>
                </span>

            </button>
            <a class="navbar-brand" href="<?= $this->request->base . '/' ?> ">
                <img style="width: 200px" <?= $storesLogo; ?> alt="Logomarca">
            </a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $this->request->base . '/homes/store' ?>"><?= __("Todos os Produtos") ?></a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo $this->request->base; ?>/homes/storeContact"><?= __("Contato") ?></a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="<?php echo $this->request->base; ?>/homes/terms"><?= __("Políticas") ?></a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="btn-search btn-src nav-link"><i class="fa fa-search"></i></a>

                        <form
                            class="search_form"
                            action="<?php echo $this->request->base; ?>/homes/search"
                            method="get">
                            <input type="text" required="true" name="search" placeholder="Buscar..">
                            <button class="btn btn-info btn-small" type="submit"><?= __("Buscar") ?></button>
                        </form>
                    </li>

                    <?php if ($username) : ?>
                        <?php if ($role === 'store' || $role === 'storeAdmin') : ?>
                            <li class="nav-item dropdown drop_single ">
                                <a class="nav-link dropdown-toggle"
                                    data-toggle="dropdown"
                                    role="button"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    href="javascript:void(0)"><?= h($username) ?>
                                </a>
                                <ul class="dropdown-menu dd_first">
                                    <?php if ($role === 'store') : ?>
                                        <li>
                                            <?php echo $this->Html->link(__('Meus Pedidos'), ['controller' => 'homes', 'action' => 'demands'], ['class' => '']); ?>
                                        </li>
                                        <?php if ($configs->show_type_products === 2) : ?>
                                            <li>
                                                <?php echo $this->Html->link(__('Painel do Usuário'), ['controller' => 'storesCourses', 'action' => 'courses'], ['class' => '']); ?>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <li>
                                        <?php echo $this->Html->link(__('Sair'), ['controller' => 'users', 'action' => 'logout'], ['class' => '']); ?>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                    <?php else : ?>
                        <li class="nav-item">
                            <?= $this->Html->link(
                                __('Entrar'),
                                ['controller' => 'users', 'action' => 'login'],
                                ['class' => 'nav-link', 'id' => 'login']
                            ) ?>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav">
                    <?php if ($preferredLanguage === 'en_US') : ?>
                        <li id="eua"><img width="32px" style="margin-left: 10px; cursor: pointer;" src="<?= $this->request->webroot . 'img/american.png'; ?>"></li>
                        <li id="brazil"><img width="32px" style="margin-left: 10px; cursor: pointer;" src="<?= $this->request->webroot . 'img/brazil_inative.png'; ?>"></li>
                    <?php else : ?>
                        <li id="eua"><img width="32px" style="margin-left: 10px; cursor: pointer;" src="<?= $this->request->webroot . 'img/american_inative.png'; ?>"></li>
                        <li id="brazil"><img width="32px" style="margin-left: 10px; cursor: pointer;" src="<?= $this->request->webroot . 'img/brazil.png'; ?>"></li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php echo $this->element('store_header_cart'); ?>
        </div>
    </nav>
</header>