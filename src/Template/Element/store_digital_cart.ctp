<div class="col-lg-12 sidebar">
    <h3 class="bg-sand"><?= __("Seu Carrinho") ?> | <?= __("Total") ?> <span><?= __("R$") ?><?= h($total) ?></span></h3>
    <?php foreach ($storesCarts as $storesCart) : ?>
        <div class="order-single">
            <div class="row">
                <div class="col-md-8">
                    <div class="cart_img">
                        <img width="114px" <?= $storesCart->stores_course->photo ?> alt="cart">
                    </div>
                    <div class="cart_product-title">
                        <a href="store-single-product.html">
                            <h5><?= h($storesCart->stores_course->course) ?></h5>
                        </a>
                        <span><?= __("Quantidade:") ?> <?= h($storesCart->quantity) ?></span>
                    </div>
                </div>
                <div class="col-md-4 price">
                    <span class=""><?= __("R$") ?><?= h($storesCart->stores_course->price * $storesCart->quantity) ?></span>
                    <?= $this->Form->postLink(
                        '<i class="fa fa-close"></i>',
                        ['action' => 'storeRemoveItemCart', $storesCart->id],
                        [
                            'confirm' => __(
                                'Você realmente deseja remover esse item?',
                                $storesCart->id
                            ),
                            'class' => 'close',
                            'escape' => false
                        ]
                    ) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <br>
    <?php if ($this->request->getSession()->read('cpf')) : ?>
        <?= $this->Html->link(__('Pagar e Finalizar'), ['controller' => 'payment', 'action' => 'pay'], ['class' => 'btn btn-info btn-default card-btn']) ?>
    <?php else : ?>
        <div class="row">
            <div class="col-md-12">
                <h3><?= __("digite seu CPF para que possamos gerar sua nota fiscal") ?></h3>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-2">
                <form method="post" action="<?= $this->request->base . '/homes/setCpf' ?>">
                    <input type="text" name="cpf" class="form-control" placeholder="<?= __("CPF") ?>" required>
                    <input
                        type="hidden"
                        class="form-control"
                        name="_csrfToken"
                        value="<?= $this->request->getParam('_csrfToken'); ?>" />
                    <br>
                    <button type="submit" class="btn btn-primary-outlined btn-default"><?= __("Enviar") ?></button>
                </form>
            </div>
        </div>
        <br>
    <?php endif; ?>
</div>