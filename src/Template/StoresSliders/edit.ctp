<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= __('Editar Banner') ?></h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesSlider, ['type' => 'file']) ?>
            <fieldset class="form-fieldset-window">

                <label><b><?= __('Banner') ?></b></label>
                <?php
                echo $this->Form->control('slider[]', ['label' => false, 'type' => 'file', 'multiple' => false]);
                ?>

                <label><b><?= __('Título*') ?></b></label>
                <?php
                echo $this->Form->control('title', ['label' => false, 'class' => 'form-control']);
                ?>

                <label><b><?= __('Subtitulo*') ?></b></label>
                <?php
                echo $this->Form->control('subtitle', ['label' => false, 'class' => 'form-control']);

                echo $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser, 'class' => 'form-control']);

                echo $this->Form->control('galerys_id', ['type' => 'hidden', 'value' => '12', 'class' => 'form-control']);
                ?>

            </fieldset>

            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>