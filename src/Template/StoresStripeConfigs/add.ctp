<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Ações') ?></li>
        <li><?= $this->Html->link(__('Listar Chaves'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="storesStripeConfigs form large-9 medium-8 columns content">
    <?= $this->Form->create($storesStripeConfig) ?>
    <fieldset>
        <legend><?= __('Adicionar Chaves') ?></legend>
        <label><?= __('Chave Pública*') ?></label>
        <?php echo $this->Form->control('stripe_key', ['label' => false]); ?>
        <label><?= __('Chave Secreta*') ?></label>
        <?php echo $this->Form->control('stripe_secret', ['label' => false]); ?>
        <?php echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']); ?>
    </fieldset>
    <?= $this->Form->button(__('Adicionar')) ?>
    <?= $this->Form->end() ?>
</div>