<div class="row">
    <div class="col-md-12">
        <div class="card" style="border: 1px solid #D7D7D7; padding: 10px; box-shadow: 5px 10px #888888;">
            <div class="card-body">
                <div class="margin">
                    <p><?= $this->Flash->render() ?></p>
                    <div class="btn-group">
                        <?= $this->Html->link(__('Adicionar Nova Ementa'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
                    </div>
                </div>
                <br>
                <?php echo $this->element('table'); ?>
                <thead>
                    <tr>
                        <th><?= __('Código') ?></th>
                        <th><?= __('Menu') ?></th>
                        <th><?= __('Curso') ?></th>
                        <th><?= __('Usuário') ?></th>
                        <th><?= __('Ações') ?></th>
                    </tr>
                </thead>
                <tbody style="font-weight: bold">
                    <?php foreach ($storesMenus as $storesMenu) : ?>
                        <tr>
                            <td><?= $this->Number->format($storesMenu->id) ?></td>
                            <td><?= h($storesMenu->menu) ?></td>
                            <td><?= $storesMenu->has('stores_course') ? $this->Html->link($storesMenu->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $storesMenu->stores_course->id]) : '' ?></td>
                            <td><?= $storesMenu->has('user') ? $storesMenu->user->name : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(
                                    __('Editar'),
                                    ['action' => 'edit', $storesMenu->id],
                                    ['class' => 'btn btn-warning']
                                ) ?>
                                <?= $this->Form->postLink(
                                    __('Deletar'),
                                    ['action' => 'delete', $storesMenu->id],
                                    ['class' => 'btn btn-danger']
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th><?= __('Código') ?></th>
                        <th><?= __('Menu') ?></th>
                        <th><?= __('Curso') ?></th>
                        <th><?= __('Usuário') ?></th>
                        <th><?= __('Ações') ?></th>
                    </tr>
                </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>