<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Editar Tabela</h3>
    </div>
        <?= $this->Form->create($tablesroot) ?>
        <div class="card-body">
            <div class="form-group">
            <label for="category">Título</label>
            <?php
                echo $this->Form->control('title', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            <label for="category">Controller</label>
            <?php
                echo $this->Form->control('controller', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            <label for="category">Action</label>
            <?php
                echo $this->Form->control('action', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            <label for="category">Descrição</label>
            <?php
                echo $this->Form->control('text', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            <label for="category">Link</label>
            <?php
                echo $this->Form->control('link', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            </div>
            <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-info']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
