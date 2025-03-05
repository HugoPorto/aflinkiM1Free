<?= $this->element('store_preloader') ?>

<?php if ($this->request->controller === 'Homes' && $this->request->action === 'site') : ?>
    <?= $this->element('store_banner_promocional'); ?>
    <?= $this->element('store_slider'); ?>
<?php endif; ?>

<section class="product_section">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 offset-sm-2 col-xs-12 text-center">
                <div class="sectionTitle">
                    <h2><?= __("Produtos") ?></h2>'
                </div>
            </div>
        </div>
        <div class="row">
            <?php if ($configs->show_type_products === $NO_DIGITAL_PRODUCTS) : ?>
                <?php foreach ($storesProducts as $StoresProduct) : ?>
                    <div class="col-md-6 col-lg-2">
                        <div class="card product-card">
                            <div class="card_img card-products-site">
                                <img class="img-fluid image-products-site" <?= $StoresProduct->photo ?> />
                                <div class="hover-overlay">
                                    <?= $this->Html->link(
                                        '<i class="fa fa-cart-shopping"></i>',
                                        ['action' => 'productView', $StoresProduct->id],
                                        ['class' => 'overlay_icon right', 'escape' => false]
                                    ) ?>

                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?= $this->request->base ?>/homes/productView/<?= $StoresProduct->id ?>">
                                    <h4 class="card-title"><?= h($StoresProduct->product) ?></h4>
                                </a>
                                <span class="text-info">R$<?= h($StoresProduct->price) ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php elseif ($configs->show_type_products === $DIGITAL_PRODUCTS) : ?>
                <?php foreach ($StoresCourses as $StoresCourse) : ?>
                    <div class="col-md-6 col-lg-2">
                        <div class="card product-card">
                            <div class="card_img card-products-site">
                                <img class="img-fluid image-products-site" <?= $StoresCourse->photo ?> />
                                <div class="hover-overlay">
                                    <?= $this->Html->link(
                                        '<i class="fa fa-cart-shopping"></i>',
                                        ['action' => 'courseView', $StoresCourse->id],
                                        ['class' => 'overlay_icon right', 'escape' => false]
                                    ) ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?= $this->request->base ?>/homes/courseView/<?= $StoresCourse->id ?>">
                                    <h4 class="card-title"><?= h($StoresCourse->course) ?></h4>
                                </a>
                                <span class="text-info">R$<?= h($StoresCourse->price) ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="modal fade " id="modelBeta" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close push-xs-right" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
                <div class="container modal-item">
                    <div class="row">
                        <div class="col-md-9" style="text-align: justify;">
                            <h3 style="margin-bottom: 15px; text-align: center;"><?= __("Bem-Vindo") ?></h3>
                            <h4 style="margin-bottom: 14px; text-align: center;"><?= __("Atenção") ?></h4>
                            <p style="margin-bottom: 14px; text-align: center;">
                                <?= __("Estamos em desenvolvimento, essa é uma versão beta fechada.") ?>
                            </p>
                            <h4 style="margin-bottom: 14px; text-align: center;"><?= __("Missão") ?></h4>
                            <p style="text-align: center;">
                                <?= __("Ajudar você a vender mais, com menos esforço.") ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if ($this->request->controller === 'Homes' && $this->request->action === 'site') : ?>
    <?php if ($configs->show_type_products !== 2) : ?>
        <?= $this->element('store_partners') ?>
    <?php endif; ?>
<?php endif; ?>

<?php if ($configs->show_type_products === 2) : ?>
    <?= $this->element('store_information') ?>
<?php endif; ?>

<?php if ($configs->show_type_products !== 2) : ?>
    <?= $this->element('store_contact') ?>
<?php endif; ?>