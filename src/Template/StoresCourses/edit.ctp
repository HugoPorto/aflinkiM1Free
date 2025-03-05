<div class="col-md-12 form-add-window">
    <div class="card card-info">
        <div class="card-body">
            <?= $this->Form->create($storesCourse, ['type' => 'file']) ?>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="description"><?= __("Categorias*") ?></label>
                        <?php
                        echo $this->Form->control(
                            'digitals_categories_id',
                            [
                                'options' => $digitalsCategories,
                                'label' => false,
                                'class' => 'form-control select2bs4',
                                'style' => 'width: 100%;'
                            ]
                        );
                        ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="course"><?= __("Curso*") ?></label>
                        <?= $this->Form->control(
                            'course',
                            [
                                'label' => false,
                                'class' => 'form-control',
                                'id' => 'course'
                            ]
                        ) ?>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="course"><?= __("Subtítulo") ?></label>
                        <?= $this->Form->control(
                            'subtitle',
                            [
                                'label' => false,
                                'class' => 'form-control',
                                'id' => 'subtitulo'
                            ]
                        ) ?>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="autor"><?= __("Autor*") ?></label>
                        <?= $this->Form->control(
                            'autor',
                            [
                                'label' => false,
                                'class' => 'form-control',
                                'id' => 'id'
                            ]
                        ) ?>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for="theme"><?= __("Tema*") ?></label>
                        <?= $this->Form->control(
                            'theme',
                            [
                                'label' => false,
                                'class' => 'form-control',
                                'id' => 'theme'
                            ]
                        ) ?>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="course"><?= __("Descrição*") ?></label>
                        <?= $this->Form->control(
                            'description',
                            [
                                'label' => false,
                                'class' => 'form-control',
                            ]
                        ) ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="price"><?= __("Preço*") ?></label>
                        <?= $this->Form->control(
                            'price',
                            [
                                'label' => false,
                                'class' => 'form-control',
                                'id' => 'price'
                            ]
                        ) ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <?php
                    echo $this->Form->control('status', [
                        'label' => false,
                        'id' => 'status',
                        'class' => 'form-check-input'
                    ]);
                    ?>
                    <label for="status_menu"><?= __("Ativo") ?></label>
                </div>
            </div>

            <?= $this->Form->button(__("Salvar"), ['class' => 'btn btn-success']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>