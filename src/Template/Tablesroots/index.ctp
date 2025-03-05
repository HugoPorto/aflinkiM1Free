<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="margin">
                    <div class="btn-group">
                        <?= $this->Html->link(__('Adicionar'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
                    </div>
                </div>
                <br>
                <table id="general" class="table table-borderless font-table">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Titulo</th>
                            <th>Texto</th>
                            <th>Link</th>
                            <th>Criado Em</th>
                            <th>Modificado Em</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tablesroots as $tablesroot) : ?>
                            <tr>
                                <td><?= $this->Number->format($tablesroot->id) ?></td>
                                <td><?= h($tablesroot->title) ?></td>
                                <td><?= h($tablesroot->text) ?></td>
                                <td><?= $this->Html->link($tablesroot->link, $tablesroot->link) ?></td>
                                <td><?= h($tablesroot->created) ?></td>
                                <td><?= h($tablesroot->modified) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tablesroot->id], ['class' => 'btn btn-outline-info']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Código</th>
                            <th>Titulo</th>
                            <th>Texto</th>
                            <th>Link</th>
                            <th>Criado Em</th>
                            <th>Modificado Em</th>
                            <th>Ações</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>