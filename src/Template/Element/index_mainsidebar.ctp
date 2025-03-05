<?php if ($role === 'root' && $roleBuilder  == null) : ?>
    <aside class="main-sidebar sidebar-light-info elevation-4">
    <?php elseif ($role === 'storeAdmin' && $roleBuilder  === 'admin') : ?>
        <aside class="main-sidebar sidebar-light-info elevation-4">
        <?php elseif ($role === 'store' && $roleBuilder  == null) : ?>
            <aside class="main-sidebar elevation-4 sidebar-light-primary">
            <?php elseif ($role === 'store' && $roleBuilder  == 'builder') : ?>
                <aside class="main-sidebar elevation-4 sidebar-light-primary">
                <?php else : ?>
                    <aside class="main-sidebar elevation-4 sidebar-light-primary">
                    <?php endif; ?>

                    <?php echo $this->element('index_brand_logo'); ?>

                    <?php echo $this->element('index_sidebar'); ?>

                    </aside>