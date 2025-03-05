<div class="card">
    <div class="card-body">
        <table class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Logo') ?></th>
                    <th><?= __('Criada Em') ?></th>
                    <th><?= __('Última Modificação') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesLogos as $storesLogo) : ?>
                    <tr>
                        <td><?= $this->Number->format($storesLogo->id) ?></td>
                        <td>
                            <img style="width: 200px; border: 1px solid #d7d7d7; padding: 10px" <?= $storesLogo->logo ?> />
                        </td>
                        <td><?= h($storesLogo->created) ?></td>
                        <td><?= h($storesLogo->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                __('Editar'),
                                ['action' => 'edit', $storesLogo->id],
                                ['class' => 'btn btn-warning']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Logo') ?></th>
                    <th><?= __('Criada Em') ?></th>
                    <th><?= __('Última Modificação') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>