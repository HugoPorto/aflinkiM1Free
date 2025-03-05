<section class="single_item">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single_item-img">
                    <img style="max-width: 5120px; min-width: 250px; max-height: 5120px; min-height: 250px;" <?= $storesCourse->photo; ?> />
                </div>
            </div>
            <div class="col-md-6">
                <div class="single_item-details">
                    <h2><?= h($storesCourse->title) ?></h2>
                    <span class="text-primary"><?= __("R$") ?><?= h($storesCourse->price) ?></span>
                    <h2 style="padding-top: 10px;">
                        <?= h($storesCourse->course) ?>
                    </h2>
                    <h4 style="margin-top: 15px"><?= __("Descrição") ?></h4>
                    <p style="padding-top: 10px; text-align: justify;">
                        <?= h($storesCourse->description) ?>
                    </p>
                    <div class="social-buttons">
                        <span class="h4"><?= __("Compartilhar:") ?></span>
                        <button class="btn btn-social facebook" onclick="facebook()">
                            <i class="fa-brands fa-square-facebook"></i>
                        </button>
                    </div>
                    <br />
                    <br />
                    <br />
                    <form action="<?= $this->request->base; ?>/stores-carts/add" method="post">
                        <input type="hidden" name="stores_courses_id" value="<?= $storesCourse->id ?>">
                        <input
                            type="hidden"
                            class="form-control"
                            name="_csrfToken"
                            value="<?= $this->request->getParam('_csrfToken'); ?>" />
                        <button class="btn btn-primary btn-default" type="submit">
                            <i class="fa fa-cart-shopping"></i> <?= __("Adicionar ao carrinho") ?>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <br>
                <h2><?= __("Ementa") ?></h2>
                <br>
                <ol class="list-group no-border">
                    <?php foreach ($menus as $menu) : ?>
                        <li class="bg-sand" style="padding: 10px;">
                            <h4><?= h($menu->menu) ?></h4>
                        </li>
                    <?php endforeach; ?>
                </ol>
            </div>
        </div>
    </div>
</section>