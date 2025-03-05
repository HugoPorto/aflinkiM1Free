<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Todos'), ['action' => 'index'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <div class="margin">
            <table class="vertical-table table table-striped table_view">
                <tr>
                    <th scope="row"><?= __('Image') ?></th>
                    <td>
                        <?php

                            echo $this->Html->image('galerys/' . $imageProfile->galerys_id . '/' . $imageProfile->image);

                        ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Galery') ?></th>
                    <td><?= $imageProfile->has('galery') ? $this->Html->link($imageProfile->galery->title, ['controller' => 'Galerys', 'action' => 'view', $imageProfile->galery->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('User') ?></th>
                    <td><?= $imageProfile->has('user') ? $this->Html->link($imageProfile->user->name, ['controller' => 'Users', 'action' => 'view', $imageProfile->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($imageProfile->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($imageProfile->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($imageProfile->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
