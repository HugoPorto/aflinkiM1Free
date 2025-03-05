<div class="card">
    <div class="card-body">
        <table class="table table-borderless font-table">
            <thead class="table-dark">
                <tr>
                    <th><?= __('código') ?></th>
                    <th><?= __('rodapé') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesFooters as $storesFooter) : ?>
                    <tr>
                        <td><?= $this->Number->format($storesFooter->id) ?></td>
                        <td><?= h($storesFooter->footer) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('Ver'), ['action' => 'view', $storesFooter->id], ['class' => 'btn btn-info']) ?>
                            <?= $this->Html->link(__('Editar'), ['action' => 'edit', $storesFooter->id], ['class' => 'btn btn-warning']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?= __('código') ?></th>
                    <th><?= __('rodapé') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>