<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= __("Usuários") ?></h3>
            </div>
            <div class="card-body">
                <table id="users" class="table table-bordered table-sm table-striped dataTable dtr-inline table-hover">
                    <thead>
                        <tr>
                            <th><?= __("Código") ?></th>
                            <th><?= __("Nome") ?></th>
                            <th><?= __("Sobrenome") ?></th>
                            <th><?= __("Username") ?></th>
                            <th><?= __("E-mail") ?></th>
                            <th><?= __("Telefone") ?></th>
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
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><?= __("Código") ?></th>
                            <th><?= __("Nome") ?></th>
                            <th><?= __("Sobrenome") ?></th>
                            <th><?= __("Username") ?></th>
                            <th><?= __("E-mail") ?></th>
                            <th><?= __("Telefone") ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= __("Usuários Root") ?></h3>
            </div>
            <div class="card-body">
                <table id="users_root" class="table table-bordered table-sm table-striped dataTable dtr-inline table-hover">
                    <thead>
                        <tr>
                            <th><?= __("Código") ?></th>
                            <th><?= __("Nome") ?></th>
                            <th><?= __("Sobrenome") ?></th>
                            <th><?= __("Username") ?></th>
                            <th><?= __("E-mail") ?></th>
                            <th><?= __("Telefone") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersRoot as $user) : ?>
                            <tr>
                                <td><?= $this->Number->format($user->id) ?></td>
                                <td><strong><?= h($user->name) ?></strong></td>
                                <td><?= h($user->lastname) ?></td>
                                <td><?= h($user->username) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= h($user->cellphone) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><?= __("Código") ?></th>
                            <th><?= __("Nome") ?></th>
                            <th><?= __("Sobrenome") ?></th>
                            <th><?= __("Username") ?></th>
                            <th><?= __("E-mail") ?></th>
                            <th><?= __("Telefone") ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?= __("Usuários Administradores") ?></h3>
            </div>
            <div class="card-body">
                <table id="users_admin" class="table table-bordered table-sm table-striped dataTable dtr-inline table-hover">
                    <thead>
                        <tr>
                            <th><?= __("Código") ?></th>
                            <th><?= __("Nome") ?></th>
                            <th><?= __("Sobrenome") ?></th>
                            <th><?= __("Username") ?></th>
                            <th><?= __("E-mail") ?></th>
                            <th><?= __("Telefone") ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersAdmin as $user) : ?>
                            <tr>
                                <td><?= $this->Number->format($user->id) ?></td>
                                <td><strong><?= h($user->name) ?></strong></td>
                                <td><?= h($user->lastname) ?></td>
                                <td><?= h($user->username) ?></td>
                                <td><?= h($user->email) ?></td>
                                <td><?= h($user->cellphone) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th><?= __("Código") ?></th>
                            <th><?= __("Nome") ?></th>
                            <th><?= __("Sobrenome") ?></th>
                            <th><?= __("Username") ?></th>
                            <th><?= __("E-mail") ?></th>
                            <th><?= __("Telefone") ?></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>