<div class="card">
    <div class="card-body">
        <?php if (empty($storesTerms->toArray())) : ?>
            <div class="margin">
                <div class="btn-group">
                    <?= $this->Html->link(__('Adicionar Termos'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
                </div>
            </div>
            <br>
        <?php endif; ?>
        <table class="table table-borderless font-table">
            <thead>
                <tr>
                    <th><?= __('Termos') ?></th>
                    <th><?= __('Ver') ?></th>
                    <th><?= __('Editar') ?></th>
                    <th><?= __('Deletar') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($storesTerms as $storesTerm) : ?>
                    <tr>
                        <td><?= h($storesTerm->terms) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesTerm->id], ['class' => 'btn btn-info']) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesTerm->id], ['class' => 'btn btn-warning']) ?>
                        </td>
                        <td class="actions">
                            <?= $this->Form->postLink(__('Deletar'), ['action' => 'delete', $storesTerm->id], ['confirm' => __('Tem certeza que deseja apagar esse item?'), 'class' => 'btn btn-danger']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>