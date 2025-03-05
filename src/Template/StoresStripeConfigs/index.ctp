<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?php if (empty($storesStripeConfigs->toArray())) : ?>
                    <?= $this->Html->link(
                        __('Adicionar Chaves'),
                        ['action' => 'add'],
                        ['class' => 'btn btn-info']
                    ) ?>
                <?php endif; ?>
            </div>
        </div>
        <br>
        <table class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Chave Pública') ?></th>
                    <th><?= __('Chave Secreta') ?></th>
                    <th><?= __('Criado Em') ?></th>
                    <th><?= __('Última Modificação') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesStripeConfigs as $storesStripeConfig) : ?>
                    <tr>
                        <td>
                            <?= $this->Number->format($storesStripeConfig->id) ?>
                        </td>
                        <td style="word-break: break-all;">
                            <?= h($storesStripeConfig->stripe_key) ?>
                        </td>
                        <td style="word-break: break-all;">
                            <?php if ($showStripeKeys) : ?>
                                <?= h($storesStripeConfig->stripe_secret) ?>
                            <?php else : ?>
                                #####
                            <?php endif; ?>
                        </td>
                        <td><?= h($storesStripeConfig->created) ?></td>
                        <td><?= h($storesStripeConfig->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                __('Editar'),
                                ['action' => 'edit', $storesStripeConfig->id],
                                ['class' => 'btn btn-warning']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?= __('Código') ?></th>
                    <th><?= __('Chave Pública') ?></th>
                    <th><?= __('Chave Secreta') ?></th>
                    <th><?= __('Criado Em') ?></th>
                    <th><?= __('Última Modificação') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>