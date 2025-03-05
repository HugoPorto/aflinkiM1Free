<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Editar Usuário</h3>
    </div>
        <?= $this->Form->create($user) ?>
        <div class="card-body">
            <div class="form-group">
            <label for="category">Nome</label>
            <?php
                echo $this->Form->control('name', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            <label for="category">Sobrenome</label>
            <?php
                echo $this->Form->control('lastname', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            <label for="category">Username</label>
            <?php
                echo $this->Form->control('username', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            <label for="category">E-mail</label>
            <?php
                echo $this->Form->control('email', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            <label for="category">Celular</label>
            <?php
                echo $this->Form->control('cellphone', [
                    'label' => false,
                    'class' => 'form-control',
                ]);
                ?>
            <label for="category">Senha</label>
            <?php
                echo $this->Form->control('password', [
                    'type' => 'password',
                    'label' => false,
                    'class' => 'form-control'
                ]);
                ?>
            <label for="category">Confirmar Senha</label>
            <?php
                echo $this->Form->control(
                    'confirm_password',
                    [
                        'type' => 'password',
                        'label' => false,
                        'class' => 'form-control'
                    ]
                );
                ?>
            <label for="category">Regra</label>
            <?php
                echo $this->Form->control('roles_id', [
                    'options' => $roles,
                    'label' => false,
                    'class' => 'form-control'
                ]);
                ?>
            </div>
            <?= $this->Form->button(__('Salvar'), ['class' => 'btn btn-info']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
