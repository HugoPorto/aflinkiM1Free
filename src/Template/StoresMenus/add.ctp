<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StoresMenu $storesMenu
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= __('Adicionar Ementa') ?></h3>
        </div>

        <div class="card-body">

            <?= $this->Form->create($storesMenu) ?>

            <div class="form-group">

                <?php
                echo $this->Form->control('menu', [
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => __('Ementa*')
                ]);
                ?>

            </div>

            <div class="form-group">

                <label for="stores_courses_id"><?= __('Curso*') ?></label>

                <?php
                echo $this->Form->control(
                    'stores_courses_id',
                    [
                        'label' => false,
                        'options' => $storesCourses,
                        'required' => true,
                        'class' => 'form-control'
                    ]
                );
                ?>

            </div>

            <?= $this->Form->control('users_id', ['type' => 'hidden', 'value' => $idUser]); ?>

            <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>