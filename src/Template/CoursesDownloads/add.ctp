<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= __('Novo Item Para Download') ?></h3>
        </div>

        <div class="card-body">
            <?= $this->Form->create($coursesDownload) ?>

            <div class="form-group">
                <label for="link"><?= __('Link*') ?></label>
                <?= $this->Form->control(
                    'link',
                    [
                        'label' => false,
                        'class' => 'form-control',
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="stores_courses_id"><?= __('Curso*') ?></label>
                <?= $this->Form->control(
                    'stores_courses_id',
                    [
                        'options' => $storesCourses,
                        'label' => false,
                        'class' => 'form-control',
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="stores_videos_id"><?= __('Aula*') ?></label>
                <?= $this->Form->control(
                    'stores_videos_id',
                    [
                        'label' => false,
                        'class' => 'form-control',
                        'options' => $storesVideos
                    ]
                ) ?>
            </div>

            <div class="form-group">
                <label for="description"><?= __('Descrição*') ?></label>
                <?= $this->Form->control(
                    'description',
                    [
                        'label' => false,
                        'class' => 'form-control',
                    ]
                ) ?>
            </div>

            <?= $this->Form->control(
                'users_id',
                [
                    'type' => 'hidden',
                    'value' => $idUser
                ]
            ) ?>

            <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-info']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>