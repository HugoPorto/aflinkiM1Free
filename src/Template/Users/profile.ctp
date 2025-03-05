<?php if ($this->request->session()->check('Flash.flash')) : ?>
    <section class="content">
        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title"><?= __("Sucesso") ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<div class="row">
    <div class="col-md-8">
        <div class="card card-info card-outline">
            <div class="card-body box-profile">
                <?php if ($username) : ?>
                    <?php if ($role == 'storeAdmin' || $role == 'store') : ?>
                        <?php if (isset($otherUser)) : ?>
                            <?php echo $this->Html->link(
                                __('Editar Usuário'),
                                [
                                    'action' => 'editcommon',
                                    $_user['id'],
                                ]
                            );
                            ?>
                        <?php else : ?>
                            <?php echo $this->Html->link(
                                __('Editar Usuário'),
                                [
                                    'action' => 'editcommon',
                                ]
                            );
                            ?>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="text-center">
                    <?php if ($imageProfileFront != null) : ?>
                        <a href="<?= $this->request->base ?>/users/updatePhoto">
                            <?php
                            echo $this->Html->image(
                                'galerys/' . $imageProfileFront->galerys_id . '/' . $imageProfileFront->image,
                                [
                                    'class' => 'profile-user-img img-fluid img-circle'
                                ]
                            );
                            ?>
                        </a>
                    <?php else : ?>
                        <a href="<?= $this->request->base ?>/users/updatePhoto">
                            <img class="profile-user-img img-fluid img-circle"
                                src="<?php echo $this->request->webroot . 'img/ccfca13e-5ba9-4d3d-8904-717e952b24ac.jpg'; ?>">
                        </a>
                    <?php endif; ?>
                </div>
                <h3 class="profile-username text-center"><?= h($_user['name']) ?></h3>
                <p class="text-muted text-center"><?= h($_user['email']) ?></p>
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b><?= __("Telefone") ?></b>
                        <?php if ($_user['cellphone'] !== "") : ?>
                            <p class="float-right"><?= h($_user['cellphone']) ?></p>
                        <?php else : ?>
                            <a class="float-right"><?= __("Não Informado") ?></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>