<div class="card">
    <div class="card-body">
        <table class="table table-bordered" style="font-size: 13px">
            <thead class="table-dark">
                <tr>
                    <th><?= __('código') ?></th>
                    <th><?= __('slider') ?></th>
                    <th><?= __('título') ?></th>
                    <th><?= __('subtitulo') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </thead>
            <tbody style="font-weight: bold">
                <?php foreach ($storesSliders as $storesSlider) : ?>
                    <tr>
                        <td><?= $this->Number->format($storesSlider->id) ?></td>
                        <td>
                            <?php echo $this->Html->image('galerys/12/' . $storesSlider->slider, ['class' => 'img-fluid']); ?>
                        </td>
                        <td><?= h($storesSlider->title) ?></td>
                        <td><?= h($storesSlider->subtitle) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(
                                __('Editar'),
                                ['action' => 'edit', $storesSlider->id],
                                ['class' => 'btn btn-warning']
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th><?= __('código') ?></th>
                    <th><?= __('slider') ?></th>
                    <th><?= __('título') ?></th>
                    <th><?= __('subtitulo') ?></th>
                    <th><?= __('Ações') ?></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>