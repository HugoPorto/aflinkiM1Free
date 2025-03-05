<?php $this->layout = false; ?>

<?php echo $this->element('store_head'); ?>

<body id="body" class="">

    <?php echo $this->element('store_bottombar'); ?>

    <?php echo $this->element('store_header'); ?>

    <div class="main-wrapper home_transparent-wrapper @@active  contactus">

        <section class="contact-page">
            <div class="container">
                <div class="row">
                    <?php if ($storesContacts->infoactive) : ?>
                        <?php if (!empty($storesContacts->map)) : ?>
                            <div class="col-md-12">
                                <?= $storesContacts->map ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="col-md-6 col-lg-7 mb-4 mb-md-0">
                        <?php if (isset($sended)) : ?>
                            <h3><?= __("Mensagem enviando com sucesso.") ?></h3>
                        <?php endif; ?>
                        <form method="post" action="<?= $this->request->base ?>/homes/addMessage">
                            <h2><?= __("Mensagem") ?></h2>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <input type="text" class="form-control" name="name" id="exampleInputName" placeholder="<?= __("Nome*") ?>" required>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="<?= __("E'mail*") ?>" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="exampleTextarea" name="message" rows="5" placeholder="<?= __("Mensagem*") ?>" required></textarea>
                                </div>
                                <input
                                    type="hidden"
                                    class="form-control"
                                    name="_csrfToken"
                                    value="<?= $this->request->getParam('_csrfToken'); ?>" />
                            </div>
                            <button type="submit" class="btn btn-default btn-primary"><?= __("Enviar") ?></button>
                        </form>
                    </div>
                    <?php if ($storesContacts->infoactive) : ?>
                        <div class="col-md-6 col-lg-5">
                            <div class="address-area py-0">
                                <h2><?= h($storesContacts->title) ?></h2>
                                <p><?= h($storesContacts->subtitle) ?></p>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <i class="fa fa-map-marker text-primary"></i>
                                        <p><?= h($storesContacts->locale) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-phone text-primary"></i>
                                        <p><?= h($storesContacts->phone) ?></p> <br>
                                        <p><?= h($storesContacts->cellphone) ?></p>
                                    </li>
                                    <li class="list-group-item">
                                        <i class="fa fa-envelope text-primary"></i>
                                        <p><?= h($storesContacts->email) ?></p> <br>
                                        <p><?= h($storesContacts->subemail) ?></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php echo $this->element('store_footer'); ?>