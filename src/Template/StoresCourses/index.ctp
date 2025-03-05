<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="margin">
                    <div class="btn-group">
                        <?= $this->Html->link(__('<i class="fa fa-plus"></i> Adicionar'), ['action' => 'add'], ['class' => 'btn btn-primary', 'escape' => false]) ?>
                    </div>
                </div>
                <?php echo $this->element('table'); ?>
                <thead>
                    <tr>
                        <th><?= __('Código') ?></th>
                        <th><?= __('Curso') ?></th>
                        <th><?= __('Tema') ?></th>
                        <th><?= __('Imagem') ?></th>
                        <th><?= __('Autor') ?></th>
                        <th><?= __('Aulas') ?></th>
                        <th><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($storesCourses as $storesCourse) : ?>
                        <tr>
                            <td><?= $this->Number->format($storesCourse->id) ?></td>
                            <td><?= h($storesCourse->course) ?></td>
                            <td><?= h($storesCourse->theme) ?></td>
                            <td>
                                <img class="img-circle img-size-32 mr-2" id="image_course" <?= $storesCourse->photo ?> />
                            </td>
                            <td><?= h($storesCourse->autor) ?></td>
                            <td><?= $this->Html->link(__('Todas as Aulas'), ['controller' => 'storesVideos', 'action' => 'index', $storesCourse->id]) ?></td>
                            <td class="actions">
                                <table>
                                    <tr id="col_button">
                                        <td>
                                            <?= $this->Html->link(
                                                __('<i class="fa fa-eye"></i> Visualizar Curso'),
                                                ['action' => 'view', $storesCourse->id],
                                                ['class' => 'btn btn-outline-primary', 'escape' => false]
                                            ) ?>
                                        </td>
                                        <td>
                                            <?= $this->Html->link(
                                                __('<i class="fa fa-edit"></i> Editar Curso'),
                                                ['action' => 'edit', $storesCourse->id],
                                                ['class' => 'btn btn-outline-success', 'escape' => false]
                                            ) ?>
                                        </td>
                                        <td>
                                            <?= $this->Html->link(
                                                __('<i class="fa fa-edit"></i> Editar Foto'),
                                                ['action' => 'editPhoto', $storesCourse->id],
                                                ['class' => 'btn btn-outline-success', 'escape' => false]
                                            ) ?>
                                        </td>
                                        <!-- <td>
                                            <?= $this->Html->link(
                                                __('<i class="fa fa-plus"></i> Adicionar Aula'),
                                                ['action' => 'view', $storesCourse->id],
                                                ['class' => 'btn btn-outline-primary', 'escape' => false]
                                            ) ?>
                                        </td> -->
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th><?= __('Código') ?></th>
                        <th><?= __('Curso') ?></th>
                        <th><?= __('Tema') ?></th>
                        <th><?= __('Imagem') ?></th>
                        <th><?= __('Autor') ?></th>
                        <th><?= __('Aulas') ?></th>
                        <th><?= __('Ações') ?></th>
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>