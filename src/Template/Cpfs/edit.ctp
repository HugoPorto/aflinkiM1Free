<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cpf->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cpf->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Cpfs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cpfs form large-9 medium-8 columns content">
    <?= $this->Form->create($cpf) ?>
    <fieldset>
        <legend><?= __('Edit Cpf') ?></legend>
        <?php
        echo $this->Form->control('cpf');
        echo $this->Form->control('users_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>