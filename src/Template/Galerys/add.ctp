<div class="col-md-6 form-add-window">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Adicionar Novo Título</h3>
        </div>
        <?= $this->Form->create($galery) ?>
        <div class="card-body">
            <div class="form-group">
                <label for="title">Título</label>
                <?php
                    echo $this->Form->control(
                        'title',
                        [
                        'label' => false,
                        'class' => 'form-control',
                        ]
                    );
                    ?>
            </div>
            <?= $this->Form->button(__('Adicionar'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
