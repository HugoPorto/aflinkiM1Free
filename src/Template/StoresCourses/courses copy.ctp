<?php if ($roleBuilder !== 'builder'): ?>
    <meta name="csrf-token" content="<?= $this->request->_csrfToken ?>" />
    <div class="card bg-success">
        <div class="card-header">
            <h3 class="card-title">Torne-se um usuário builder</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <p>Sendo um usuário builder você poderá se afiliar a nossos produtos e ganhar comissões por cada venda realizada.
                Você também poderá criar seus próprios produtos e disponibilizá-los para afiliação.</p>

            <input type="checkbox" name="my-checkbox" data-bootstrap-switch data-off-color="danger" data-on-color="primary">
        </div>
    </div>
<?php endif; ?>
<div class="card">
    <div class="card-body">
        <p><?= $this->Flash->render() ?></p>
        <table id="general" class="table table-borderless font-table">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Meus Cursos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses_user as $courses) : ?>
                    <tr>
                        <th><?= h($courses->id) ?></th>
                        <td>
                            <h4><?= h($courses->course) ?></h4>
                            <br>
                            <br>
                            <a href="<?= $this->request->base . '/stores-courses/courseView/' .  $courses->id ?>"><img class="image-table-course" <?= $courses->photo ?> /></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Código</th>
                    <th>Meus Cursos</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>