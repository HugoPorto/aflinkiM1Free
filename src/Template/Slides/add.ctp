<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slide $slide
 */
?>
<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= __('Adicionar Slide') ?></h3>
        </div>

        <div class="card-body">

            <?= $this->Form->create($slide) ?>

            <div class="form-group">

                <label for="stores_courses_id"><?= __('Código do Slide*') ?></label>

                <?php
                echo $this->Form->control('slide', [
                    'label' => false,
                    'class' => 'form-control',
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