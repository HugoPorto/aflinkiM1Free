<?php

$this->layout = false;

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Aflinki | Login</title>

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

<body class="hold-transition login-page">

  <div class="login-box">

    <div class="login-logo">

      <a href="<?= $this->request->base ?>/"><b>Focu</b>X</a>

    </div>

    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg">Faça o login para iniciar sua sessão</p>

        <p class="login-box-msg"><?= $this->Flash->render() ?></p>

        <form action="<?= $this->request->base ?>/users/login" method="post">

          <div class="input-group mb-3">

            <input type="email" name="email" class="form-control" placeholder="E-mail">

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

          <input type="hidden" class="form-control" name="_csrfToken"

            value="<?= $this->request->getParam('_csrfToken'); ?>" />

          <div class="row">

            <div class="col-8"></div>

            <div class="col-4">

              <button type="submit" class="btn btn-primary btn-block">Login</button>

            </div>

          </div>

        </form>

        <p class="mb-1">

          <a href="<?= $this->request->base ?>/forgotPassword">Recuperar password</a>

        </p>

        <p class="mb-0">

          <a href="<?= $this->request->base ?>/registerV2" class="text-center">Novo registro</a>

        </p>

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