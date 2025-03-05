<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= __('Editar Contato') ?></h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($storesContact) ?>
            <fieldset class="form-fieldset-window">
                <legend><?= __('Editar') ?></legend>
                <label><?= __('Contatos') ?></label>
                <?php
                echo $this->Form->control(
                    'contact',
                    [
                        'label' => false,
                        'class' => 'form-control'
                    ]
                );
                ?>
                <label><?= __('Título') ?></label>
                <?php
                echo $this->Form->control(
                    'title',
                    [
                        'label' => false,
                        'class' => 'form-control'
                    ]
                );
                ?>
                <label><?= __('Subtítulo') ?></label>
                <?php
                echo $this->Form->control(
                    'subtitle',
                    [
                        'label' => false,
                        'class' => 'form-control'
                    ]
                );
                ?>
                <label><?= __('Local') ?></label>
                <?php
                echo $this->Form->control(
                    'locale',
                    [
                        'label' => false,
                        'class' => 'form-control'
                    ]
                );
                ?>
                <label><?= __('Fone') ?></label>
                <?php
                echo $this->Form->control(
                    'phone',
                    [
                        'label' => false,
                        'class' => 'form-control'
                    ]
                );
                ?>
                <label><?= __('Celular') ?></label>
                <?php
                echo $this->Form->control(
                    'cellphone',
                    [
                        'label' => false,
                        'class' => 'form-control'
                    ]
                );
                ?>
                <label><?= __('E-mail') ?></label>
                <?php
                echo $this->Form->control(
                    'email',
                    [
                        'label' => false,
                        'class' => 'form-control'
                    ]
                );
                ?>
                <label><?= __('E-mail 2') ?></label>
                <?php
                echo $this->Form->control(
                    'subemail',
                    [
                        'label' => false,
                        'class' => 'form-control'
                    ]
                );
                ?>
                <label><?= __('Mapa') ?></label>
                <?php
                echo $this->Form->control('map', [
                    'label' => false,
                    'class' => 'form-control',
                    'type' => 'textarea'
                ]);
                ?>
                <br>
                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <?php if ($storesContact->infoactive) : ?>
                            <input class="custom-control-input" type="checkbox" name="infoactive" id="customCheckbox1" value="1" checked>
                        <?php elseif (!$storesContact->infoactive) : ?>
                            <input class="custom-control-input" type="checkbox" name="infoactive" id="customCheckbox1" value="0">
                        <?php endif; ?>
                        <label for="customCheckbox1" class="custom-control-label"><?= __('Informações') ?></label>
                    </div>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-warning']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>