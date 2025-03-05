<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Editar Categoria'), ['action' => 'edit', $digitalsCategory->id], ['class' => 'btn btn-warning']) ?>
            </div>
            <div class="btn-group">
                <button class="btn btn-danger" onclick="toastrDeleteCategory(<?= $digitalsCategory->id; ?>)">
                    Deletar
                </button>
            </div>
            <div class="btn-group">
                <?= $this->Html->link(__('Categorias'), ['action' => 'index'], ['class' => 'btn btn-info']) ?>
            </div>
            <div class="btn-group">
                <?= $this->Html->link(__('Nova Categoria'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="margin">
            <table class="vertical-table table table-striped table_view">
                <tr>
                    <th scope="row"><?= __('Código') ?></th>
                    <td><?= $this->Number->format($digitalsCategory->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Categoria') ?></th>
                    <td><?= h($digitalsCategory->category) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Criado Em') ?></th>
                    <td><?= h($digitalsCategory->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Última Modificação') ?></th>
                    <td><?= h($digitalsCategory->modified) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Ativo no menu do site') ?></th>
                    <td><?= $digitalsCategory->status_menu ? __('Sim') : __('Não'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
