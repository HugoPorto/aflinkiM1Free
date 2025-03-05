<?php
$this->layout = false;
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aflinki | Registro</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <?= $this->Html->css(
        [
            '/adminlte/plugins/fontawesome-free/css/all.min.css',
            '/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
            '/adminlte/dist/css/adminlte.min.css',
        ]
    ); ?>

    <?= $this->Html->meta('icon', 'img/favicon.png', ['type' => 'image/png']) ?>
</head>

<body class="hold-transition register-page">

    <div class="register-box">

        <div class="register-logo">

            <a href="<?= $this->request->base ?>/"><b>Focu</b>X</a>

        </div>

        <div class="card">

            <div class="card-body register-card-body">

                <p class="login-box-msg">Registrar novo membro</p>

                <form action="<?= $this->request->base ?>/users/registerV2" method="post">

                    <div class="input-group mb-3">

                        <input type="text" name="name" class="form-control" placeholder="Nome">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                    <div class="input-group mb-3">

                        <input type="text" name="lastname" class="form-control" placeholder="Sobrenome">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                    <div class="input-group mb-3">

                        <input type="text" name="username" class="form-control" placeholder="Username">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-user"></span>

                            </div>

                        </div>

                    </div>

                    <div class="input-group mb-3">

                        <input type="email" name="email" class="form-control" placeholder="Email">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-envelope"></span>

                            </div>

                        </div>

                    </div>

                    <div class="input-group mb-3">

                        <input type="password" name="password" class="form-control" placeholder="Password">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-lock"></span>

                            </div>

                        </div>

                    </div>

                    <div class="input-group mb-3">

                        <input
                            type="hidden"
                            class="form-control"
                            name="_csrfToken"
                            value="<?= $this->request->getParam('_csrfToken'); ?>" />

                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirme o password">

                        <input type="hidden" name="roles_id" value="11">

                        <div class="input-group-append">

                            <div class="input-group-text">

                                <span class="fas fa-lock"></span>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-8">

                            <div class="icheck-primary">

                                <input type="checkbox" id="agreeTerms" name="terms" required>

                                <label for="agreeTerms">Eu aceito os <a href="<?= $this->request->base ?>/terms" target="_blank">termos</a></label>

                            </div>

                        </div>

                        <div class="col-4">

                            <button type="submit" class="btn btn-primary btn-block">Registrar</button>

                        </div>

                    </div>

                </form>

                <a href="<?= $this->request->base ?>/loginV2" class="text-center">Já tenho uma conta</a>

            </div>

        </div>

    </div>

    <?php
    echo $this->Html->script(
        [
            '/adminlte/plugins/jquery/jquery.min.js',
            '/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
            '/adminlte/dist/js/adminlte.min.js',
        ]
    ); ?>

</body>

</html>