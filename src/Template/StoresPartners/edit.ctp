<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresPartner $storesPartner
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= __('Editar Parceiro') ?></h3>
        </div>

        <?= $this->Form->create($storesPartner, ['type' => 'file']) ?>

        <div class="card-body">

            <div class="form-group">
                <label for="partner"><?= __('Parceiro') ?></label>
                <?php echo $this->Form->control('partner', [
                    'class' => 'form-control',
                    'label' => false,
                    'id' => 'partner'
                ]); ?>
            </div>

            <div class="form-group">
                <label for="photo"><?= __('Photo') ?></label>
                <?php echo $this->Form->control('photo[]', [
                    'label' => false,
                    'id' => 'photo',
                    'type' => 'file',
                    'multiple' => false
                ]); ?>
            </div>

            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>