<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-striped table_view">
                <tr>
                    <th scope="row"><?= __('Código Da Regra') ?></th>
                    <td><?= $this->Number->format($role->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Regra') ?></th>
                    <td><?= h($role->role) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Regra Dois') ?></th>
                    <td><?= h($role->role_two) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($role->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modificado Em') ?></th>
                    <td><?= h($role->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
