<div class="card">
    <div class="card-body">
        <div class="margin">
            <div class="btn-group">
                <?= $this->Html->link(__('Adicionar'), ['action' => 'add'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>
        <br>
        <?php echo $this->element('table'); ?>
        <thead>
            <tr>
                <th><?= __('Código') ?></th>
                <th><?= __('Link') ?></th>
                <th><?= __('Descrição') ?></th>
                <th><?= __('Curso') ?></th>
                <th><?= __('Video') ?></th>
                <th><?= __('Criado Em') ?></th>
                <th><?= __('Última Modificação') ?></th>
                <th><?= __('Usuário') ?></th>
                <th><?= __('Ações') ?></th>
            </tr>
        </thead>
        <tbody style="font-weight: bold">
            <?php foreach ($coursesDownloads as $coursesDownload) : ?>
                <tr>
                    <td><?= $this->Number->format($coursesDownload->id) ?></td>
                    <td><?= h($coursesDownload->link) ?></td>
                    <td><?= h($coursesDownload->description) ?></td>
                    <td><?= $coursesDownload->has('stores_course') ? $this->Html->link($coursesDownload->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $coursesDownload->stores_course->id]) : '' ?></td>
                    <td><?= $coursesDownload->has('stores_video') ? $this->Html->link($coursesDownload->stores_video->title, ['controller' => 'StoresVideos', 'action' => 'view', $coursesDownload->stores_video->id]) : '' ?></td>
                    <td><?= h($coursesDownload->created) ?></td>
                    <td><?= h($coursesDownload->modified) ?></td>
                    <td><?= $coursesDownload->has('user') ? $coursesDownload->user->name : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver'), ['action' => 'view', $coursesDownload->id]) ?>
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $coursesDownload->id], ['class' => 'btn btn-warning']) ?>
                        <?= $this->Form->postLink(__('Apagar'), ['action' => 'delete', $coursesDownload->id]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th><?= __('Código') ?></th>
                <th><?= __('Link') ?></th>
                <th><?= __('Descrição') ?></th>
                <th><?= __('Curso') ?></th>
                <th><?= __('Video') ?></th>
                <th><?= __('Criado Em') ?></th>
                <th><?= __('Última Modificação') ?></th>
                <th><?= __('Usuário') ?></th>
                <th><?= __('Ações') ?></th>
            </tr>
        </tfoot>
        </table>
    </div>
</div>