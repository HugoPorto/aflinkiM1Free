<div class="card">
    <div class="card-body">
        <table class="table table-borderless font-table">
            <thead class="table-dark">
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Horários') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesHours as $storesHour) : ?>
                    <tr>
                        <td><?= $this->Number->format($storesHour->id) ?></td>
                        <td><?= h($storesHour->hour) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                __('Editar'),
                                ['action' => 'edit', $storesHour->id],
                                ['class' => 'btn btn-warning']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Horários') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>