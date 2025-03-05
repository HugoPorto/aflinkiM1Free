<?php if ($this->request->controller === 'Homes' && $this->request->action === 'productView') : ?>
    <?= $this->element('store_head_product_view') ?>
<?php else : ?>
    <?= $this->element('store_head') ?>
<?php endif; ?>

<body id="body" class="">









    <?= $this->element('store_bottombar') ?>

    <?= $this->element('store_header') ?>

    <div
        id="circularMenu"
        class="circular-menu">
        <a
            class="floating-btn"
            onclick="document.getElementById('circularMenu').classList.toggle('active');">
            <i class="fa fa-plus"></i>
        </a>
        <menu class="items-wrapper">
            <a
                href=""
                target="_blank"
                class="menu-item fa-brands fa-square-facebook"></a>
            <a
                href=""
                target="_blank"
                class="menu-item fa-brands fa-x-twitter"></a>
            <a
                href=""
                target="_blank"
                class="menu-item fa-brands fa-tiktok"></a>
            <a
                href=""
                target="_blank"
                class="menu-item fa-brands fa-linkedin"></a>
        </menu>
    </div>
    <div
        id="circularMenu1"
        class="circular-menu circular-menu-left">
        <a class="floating-btn" onclick="document.getElementById('circularMenu1').classList.toggle('active');">
            <i class="fa fa-bars"></i>
        </a>

        <menu
            class="items-wrapper">
            <a
                href="<?php echo $this->request->base . '/'; ?>"
                class="menu-item fa fa-home"></a>
            <a
                href="<?php echo $this->request->base . '/admin'; ?>"
                class="menu-item fa fa-user"></a>
        </menu>
    </div>

    <div class="main-wrapper home_transparent-wrapper @@active  home-beauty">

        <?= $this->fetch('content') ?>

        <?= $this->element('store_footer'); ?>