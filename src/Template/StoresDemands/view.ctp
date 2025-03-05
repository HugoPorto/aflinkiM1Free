<div class="card">
    <div class="card-body">
        <div class="margin">
            <table class="vertical-table table table-striped table_view">
                <tr>
                    <th scope="row"><?= __('User') ?></th>
                    <td><?= h($storesDemand->user->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('User ID') ?></th>
                    <td><?= h($storesDemand->user->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Code') ?></th>
                    <td><?= $this->Number->format($storesDemand->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created At') ?></th>
                    <td><?= h($storesDemand->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Last Modified') ?></th>
                    <td><?= h($storesDemand->modified) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Status') ?></th>
                    <td>
                        <?php if ($storesDemand->status) : ?>
                            <span class="badge badge-success"><?= __('Processed') ?></span>
                        <?php else : ?>
                            <span class="badge badge-danger"><?= __('Processing..') ?></span>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>