<div class="card">
    <div class="card-body">
        <table id="general" class="table table-borderless font-table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Photo</th>
                    <th>Usuário</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($imageProfiles as $imageProfile) : ?>
                    <tr>
                        <td><?= $this->Number->format($imageProfile->id) ?></td>
                        <td><?= h($imageProfile->image) ?></td>
                        <td><?= $imageProfile->has('user') ? $this->Html->link($imageProfile->user->name, ['controller' => 'Users', 'action' => 'view', $imageProfile->user->id]) : '' ?></td>
                        <td class="actions">
                            <div class="margin">
                                <div class="btn-group">
                                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $imageProfile->id], ['class' => 'btn btn-info']) ?>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Photo</th>
                    <th>Usuário</th>
                    <th>Ações</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
