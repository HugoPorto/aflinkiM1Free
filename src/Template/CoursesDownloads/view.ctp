<div class="coursesDownloads view large-9 medium-8 columns content">
    <h3><?= h($coursesDownload->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Link') ?></th>
            <td><?= h($coursesDownload->link) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Course') ?></th>
            <td><?= $coursesDownload->has('stores_course') ? $this->Html->link($coursesDownload->stores_course->course, ['controller' => 'StoresCourses', 'action' => 'view', $coursesDownload->stores_course->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Stores Video') ?></th>
            <td><?= $coursesDownload->has('stores_video') ? $this->Html->link($coursesDownload->stores_video->title, ['controller' => 'StoresVideos', 'action' => 'view', $coursesDownload->stores_video->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $coursesDownload->has('user') ? $this->Html->link($coursesDownload->user->name, ['controller' => 'Users', 'action' => 'view', $coursesDownload->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($coursesDownload->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($coursesDownload->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($coursesDownload->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($coursesDownload->description)); ?>
    </div>
</div>