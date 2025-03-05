<div class="card">
    <div class="card-body">
        <?php echo $this->element('table'); ?>
        <thead>
            <tr>
                <th><?= __("Código") ?></th>
                <th><?= __("Usuário") ?></th>
                <th><?= __("CPF") ?></th>
                <th><?= __("Valor") ?></th>
                <th><?= __("Criado Em") ?></th>
                <th><?= __("Modificado Em") ?></th>
                <th><?= __("Status") ?></th>
                <th><?= __("Ações") ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($storesDemands as $storesDemand) : ?>
                <tr>
                    <td><?= $this->Number->format($storesDemand->id) ?></td>
                    <td><?= $storesDemand->user->name ?></td>
                    <td><?= $storesDemand->cpf ?></td>
                    <td>R$ <?= number_format((float) $storesDemand->value, 2) ?></td>
                    <td><?= h($storesDemand->created) ?></td>
                    <td><?= h($storesDemand->modified) ?></td>
                    <td>
                        <?php if ($storesDemand->status) : ?>
                            <span class="badge badge-success"><?= __("Processado") ?></span>
                        <?php else : ?>
                            <span class="badge badge-danger"><?= __("Processando..") ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="actions">
                        <table>
                            <tr id="col_button">
                                <td>
                                    <?php if (!$storesDemand->status) : ?>
                                        <div class="btn-group">
                                            <button class="btn btn-warning" onclick="updateDemand(<?= $storesDemand->id; ?>)">
                                                <?= __("Atualizar Status") ?>
                                            </button>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?= $this->Html->link(
                                        __('<i class="fa fa-eye"></i> Ver'),
                                        ['action' => 'view', $storesDemand->id],
                                        [
                                            'class' => 'btn btn-outline-primary',
                                            'escape' => false
                                        ]
                                    ) ?>
                                </td>
                                <td>
                                    <?= $this->Html->link(
                                        __('<i class="fa fa-eye"></i> Itens do Pedido'),
                                        [
                                            'controller' => 'StoresItemsDemands',
                                            'action' => 'getItemByDemandId',
                                            $storesDemand->id
                                        ],
                                        [
                                            'class' => 'btn btn-outline-primary',
                                            'escape' => false
                                        ]
                                    ) ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th><?= __("Código") ?></th>
                <th><?= __("Usuário") ?></th>
                <th><?= __("CPF") ?></th>
                <th><?= __("Valor") ?></th>
                <th><?= __("Criado Em") ?></th>
                <th><?= __("Modificado Em") ?></th>
                <th><?= __("Status") ?></th>
                <th><?= __("Ações") ?></th>
            </tr>
        </tfoot>
        </table>
    </div>
</div>

<div class="modal hide fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?= __("Endereço de Entrega") ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body-address">
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= __("Fechar") ?></button>
            </div>
        </div>
    </div>
</div>