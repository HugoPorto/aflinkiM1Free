<div class="card">
    <div class="card-body">
        <table class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Contato') ?></th>
                    <th><?= __('Título') ?></th>
                    <th><?= __('Subtitulo') ?></th>
                    <th><?= __('Local') ?></th>
                    <th><?= __('Fone') ?></th>
                    <th><?= __('Celular') ?></th>
                    <th><?= __('E-mail') ?></th>
                    <th><?= __('E-mail 2') ?></th>
                    <th><?= __('Ativo') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesContacts as $storesContact) : ?>
                    <tr>
                        <td><?= $this->Number->format($storesContact->id) ?></td>
                        <td><?= h($storesContact->contact) ?></td>
                        <td><?= h($storesContact->title) ?></td>
                        <td><?= h($storesContact->subtitle) ?></td>
                        <td><?= h($storesContact->locale) ?></td>
                        <td><?= h($storesContact->phone) ?></td>
                        <td><?= h($storesContact->cellphone) ?></td>
                        <td><?= h($storesContact->email) ?></td>
                        <td><?= h($storesContact->subemail) ?></td>
                        <td><?= $storesContact->infoactive ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>' ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                __('Editar'),
                                ['action' => 'edit', $storesContact->id],
                                ['class' => 'btn btn-warning']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Contato') ?></th>
                    <th><?= __('Título') ?></th>
                    <th><?= __('Subtitulo') ?></th>
                    <th><?= __('Local') ?></th>
                    <th><?= __('Fone') ?></th>
                    <th><?= __('Celular') ?></th>
                    <th><?= __('E-mail') ?></th>
                    <th><?= __('E-mail 2') ?></th>
                    <th><?= __('Ativo') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>