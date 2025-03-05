<div class="card">
    <div class="card-body">
        <table class="table table-borderless font-table">
            <thead class="table-dark">
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Título') ?></th>
                    <th><?= __('Criado Em') ?></th>
                    <th><?= __('Última Modificação') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesTitles as $storesTitle) : ?>
                    <tr>
                        <td><?= $this->Number->format($storesTitle->id) ?></td>
                        <td><?= h($storesTitle->title) ?></td>
                        <td><?= h($storesTitle->created) ?></td>
                        <td><?= h($storesTitle->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesTitle->id], ['class' => 'btn btn-warning']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Título') ?></th>
                    <th><?= __('Criado Em') ?></th>
                    <th><?= __('Última Modificação') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>