<?php $this->layout = false; ?>

<?php echo $this->element('store_head'); ?>

<body id="body" class="">

    <?php echo $this->element('store_bottombar'); ?>

    <?php echo $this->element('store_header'); ?>

    <div class="main-wrapper home_transparent-wrapper @@active  contactus">

        <section class="about">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 offset-sm-2 col-xs-12 text-center">
                        <div class="sectionTitle">
                            <span class="h4"><?= __("BEM-VINDO") ?></span>
                            <h2><?= __("Termos e Políticas") ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 offset-sm-1">
                        <div class="about_detail-text">
                            <p class="text-justify">
                                <?= h($storesTerms['terms']) ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php echo $this->element('store_footer'); ?>