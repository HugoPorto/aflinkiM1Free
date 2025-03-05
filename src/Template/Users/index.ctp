<div class="card">
    <div class="card-body">
        <table id="general" class="table table-borderless font-table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Regra</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td><strong><?= h($user->name) ?></strong></td>
                        <td><?= h($user->lastname) ?></td>
                        <td><?= h($user->username) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->cellphone) ?></td>
                        <td><?= $user->has('role') ? $this->Html->link($user->role->role, ['controller' => 'Roles', 'action' => 'view', $user->role->id]) : '' ?></td>
                        <td class="actions">
                            <div class="margin">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id], ['class' => 'btn btn-info']) ?>
                                </div>
                                <div class="btn-group">
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id], ['class' => 'btn btn-warning']) ?>
                                </div>
                                <!-- <div class="btn-group">
                                <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $user->id], ['confirm' => __('Tem certeza que quer deletar o item # {0}?', $user->id), 'class' => 'btn btn-info']) ?>
                            </div> -->
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Celular</th>
                    <th>Regra</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>