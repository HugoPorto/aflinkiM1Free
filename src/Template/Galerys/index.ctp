<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Nova Galeria'), ['action' => 'add'], ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
        <table id="general" class="table table-borderless font-table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($galerys as $galery) : ?>
                <tr>
                    <td><?= $this->Number->format($galery->id) ?></td>
                    <td><?= h($galery->title) ?></td>
                    <td><?= h($galery->created) ?></td>
                    <td><?= h($galery->modified) ?></td>
                    <!-- <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $galery->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $galery->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $galery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $galery->id)]) ?>
                    </td> -->
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Título</th>
                    <th>Criado Em</th>
                    <th>Modificado Em</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
