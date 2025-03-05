<?php if ($this->request->session()->check('Flash.flash')) : ?>
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title"><?= __("Erro") ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= __("Editar Usuário") ?></h3>
        </div>
        <?= $this->Form->create($user, ['url' => ['action' => 'editcommon'], 'class' => 'form-horizontal']); ?>
        <div class="card-body">
            <div class="form-group">
                <label for="coin-quote-on-the-day"><?= __("Nome") ?></label>
                <?php echo $this->Form->control('name', ['class' => 'form-control', 'label' => false]); ?>
            </div>
            <?php echo $this->Form->control('username', ['class' => 'form-control']); ?>
            <div class="form-group">
                <label for="coin-quote-on-the-day"><?= __("E-mail") ?></label>
                <?php echo $this->Form->control('email', ['class' => 'form-control', 'label' => false]); ?>
            </div>
            <div class="form-group">
                <label for="coin-quote-on-the-day"><?= __("Telefone") ?></label>
                <?php echo $this->Form->control('cellphone', ['class' => 'form-control', 'label' => false]); ?>
            </div>
            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>