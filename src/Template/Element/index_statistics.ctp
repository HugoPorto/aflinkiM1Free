<?php if ($role == 'storeAdmin') : ?>
    <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>R$ <?= h(number_format((float) $boxValue[0]->sum, 2)) ?></h3>
                    <p><?= __("Pedidos") ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="<?= $this->request->base . '/stores-demands' ?>" class="small-box-footer"><?= __("Ver mais") ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3><?= h($usersCount) ?></h3>
                    <p><?= __("Usuários") ?></p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?= $this->request->base . '/pages' ?>" class="small-box-footer"><?= __("Ver mais") ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
<?php endif; ?>