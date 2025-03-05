<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__("Adicionar"), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <?php echo $this->element('table'); ?>
        <thead>
            <tr>
                <th><?= __("Título") ?></th>
                <th><?= __("Curso") ?></th>
                <th><?= __("Ver") ?></th>
                <th><?= __("Editar") ?></th>
                <th><?= __("A. para Download") ?></th>
                <th><?= __("Editar Foto") ?></th>
                <th><?= __("Delete") ?></th>
            </tr>
        </thead>
        <tbody style="font-weight: bold">
            <?php foreach ($storesVideos as $storesVideo) : ?>
                <tr>
                    <td><?= h($storesVideo->title) ?></td>
                    <td><?= $storesVideo->has('stores_course') ? $this->Html->link($storesVideo->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $storesVideo->stores_course->id]) : '' ?></td>
                    <td>
                        <?= $this->Html->link(
                            __("Ver"),
                            ['action' => 'view', $storesVideo->id],
                            ['class' => 'btn btn-info']
                        ) ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            __("Editar"),
                            ['action' => 'edit', $storesVideo->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            __("Adicionar"),
                            [
                                'controller' => 'CoursesDownloads',
                                'action' => 'addFast',
                                $storesVideo->id,
                                $storesVideo->stores_courses_id
                            ],
                            ['class' => 'btn btn-info']
                        ) ?>
                    </td>
                    <td>
                        <?= $this->Html->link(
                            __("Editar"),
                            ['action' => 'editPhoto', $storesVideo->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                    </td>
                    <td>
                        <?= $this->Form->postLink(
                            __("Delete"),
                            ['action' => 'delete', $storesVideo->id],
                            ['confirm' => __("Você tem certeza que deseja apagar esse item?", $storesVideo->id), 'class' => 'btn btn-danger']
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th><?= __("Título") ?></th>
                <th><?= __("Curso") ?></th>
                <th><?= __("Ver") ?></th>
                <th><?= __("Editar") ?></th>
                <th><?= __("A. para Download") ?></th>
                <th><?= __("Editar Foto") ?></th>
                <th><?= __("Delete") ?></th>
            </tr>
        </tfoot>
        </table>
    </div>
</div>