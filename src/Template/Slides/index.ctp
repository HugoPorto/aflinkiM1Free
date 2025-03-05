<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slide[]|\Cake\Collection\CollectionInterface $slides
 */
?>
<div class="card card-custom">
    <div class="card-body">
        <div class="margin">
            <p><?= $this->Flash->render() ?></p>
            <div class="btn-group">
                <?= $this->Html->link(__('Adicionar Slide'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <?php echo $this->element('table'); ?>
        <thead>
            <tr>
                <th><?= __('Código') ?></th>
                <th><?= __('Slide') ?></th>
                <th><?= __('Curso') ?></th>
                <th><?= __('Usuário') ?></th>
                <th><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody style="font-weight: bold">
            <?php foreach ($slides as $slide) : ?>
                <tr>
                    <td><?= $this->Number->format($slide->id) ?></td>
                    <td><?= h($slide->slide) ?></td>
                    <td><?= $slide->has('stores_course') ? $this->Html->link($slide->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $slide->stores_course->id]) : '' ?></td>
                    <td><?= $slide->has('user') ? $slide->user->name : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(
                            __('Ver'),
                            ['action' => 'view', $slide->id],
                            ['class' => 'btn btn-info']
                        ) ?>
                        <?= $this->Html->link(
                            __('Editar'),
                            ['action' => 'edit', $slide->id],
                            ['class' => 'btn btn-warning']
                        ) ?>
                        <?= $this->Form->postLink(
                            __('Deletar'),
                            ['action' => 'delete', $slide->id],
                            ['class' => 'btn btn-danger']
                        ) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th><?= __('Código') ?></th>
                <th><?= __('Slide') ?></th>
                <th><?= __('Curso') ?></th>
                <th><?= __('Usuário') ?></th>
                <th><?= __('Ações') ?></th>
            </tr>
        </tfoot>
        </table>
    </div>
</div>