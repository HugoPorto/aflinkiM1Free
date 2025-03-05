<div class="col-md-6 form-add-window">
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><?= __('Adicionar Novo Video') ?></h3>
        </div>

        <?= $this->Form->create($storesVideo, ['type' => 'file']) ?>

        <div class="card-body">

            <div class="form-group">

                <label for="title"><?= __('Título*') ?></label>

                <?php
                echo $this->Form->control('title', [
                    'label' => false,
                    'class' => 'form-control',
                    'id' => 'title'
                ]);
                ?>

            </div>

            <div class="form-group">

                <label for="video"><?= __('Video*') ?></label>

                <?php
                echo $this->Form->control('video', [
                    'label' => false,
                    'class' => 'form-control',
                    'id' => 'video'
                ]);
                ?>

            </div>

            <div class="form-group">

                <label for="description"><?= __('Descrição*') ?></label>

                <?php
                echo $this->Form->control('description', [
                    'label' => false,
                    'class' => 'form-control',
                    'id' => 'description'
                ]);
                ?>

            </div>

            <div class="form-group">

                <label for="public"><?= __('Público') ?></label>

                <?php
                echo $this->Form->control('public', [
                    'label' => false,
                    'id' => 'public'
                ]);
                ?>

            </div>

            <div class="form-group">

                <label for="public"><?= __('Ativo') ?></label>

                <?php
                echo $this->Form->control('active', [
                    'label' => false,
                    'id' => 'active'
                ]);
                ?>

            </div>

            <div class="form-group">

                <label for="Curso"><?= __('Curso*') ?></label>

                <?php
                echo $this->Form->control('stores_courses_id', ['label' => false, 'options' => $storesCourses]);
                ?>

            </div>

            <?= $this->Form->button(__('Editar'), ['class' => 'btn btn-info']) ?>

            <?= $this->Form->end() ?>

        </div>
    </div>
</div>