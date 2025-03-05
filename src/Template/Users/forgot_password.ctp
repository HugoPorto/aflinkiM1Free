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

      <a href="<?= $this->request->base ?>"><b>Focu</b>X</a>

    </div>

    <div class="card">

      <div class="card-body login-card-body">

        <p class="login-box-msg">Você esqueceu sua senha? Aqui você pode facilmente recuperar sua senha.</p>

        <form action="recover-password.html" method="post">

          <div class="input-group mb-3">

            <input type="email" class="form-control" placeholder="E-mail">

            <div class="input-group-append">

              <div class="input-group-text">

                <span class="fas fa-envelope"></span>

              </div>

            </div>

          </div>

          <div class="row">

            <div class="col-12">

              <button type="submit" class="btn btn-primary btn-block">Requisitar nova senha</button>

            </div>

          </div>

        </form>

        <p class="mt-3 mb-1">

          <a href="<?= $this->request->base . '/loginV2' ?>">Login</a>

        </p>

        <p class="mb-0">

          <a href="<?= $this->request->base . '/registerV2' ?>" class="text-center">Registrar novo usuário</a>

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