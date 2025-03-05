<div class="col-md-6 form-add-window">
    <div class="card">
        <div class="card-body">
            <?= $this->Form->create($storesCourse, ['type' => 'file']) ?>

            <div class="form-group">
                <label for="photo"><?= __("Foto*") ?></label>
                <?= $this->Form->control(
                    'photo[]',
                    [
                        'label' => false,
                        'id' => 'photo',
                        'type' => 'file',
                        'multiple' => false,
                        'required' => true
                    ]
                ) ?>
            </div>

            <?= $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser]) ?>
            <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>