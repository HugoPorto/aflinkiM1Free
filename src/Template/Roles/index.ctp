<div class="card">
    <div class="card-body">
        <table id="general" class="table table-borderless font-table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Regra</th>
                    <th>Regra Dois</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roles as $role) : ?>
                <tr>
                    <td><?= $this->Number->format($role->id) ?></td>
                    <td><?= h($role->role) ?></td>
                    <td><?= h($role->role_two) ?></td>
                    <td><?= h($role->created) ?></td>
                    <td><?= h($role->modified) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Regra</th>
                    <th>Regra Dois</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
