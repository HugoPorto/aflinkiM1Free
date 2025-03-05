<?php if (!empty($storesDemands->toArray())) : ?>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-ban"></i> <?= __("Atenção!") ?></h5>
                <?= __("Você possui pedidos que precisam ser processados. Clique") ?> <a href="<?= $this->request->base . '/stores-demands' ?>"><?= __("aqui") ?></a> <?= __("para verificar!") ?>
            </div>
        </div>
    </div>
<?php endif; ?>