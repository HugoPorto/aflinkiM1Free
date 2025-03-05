<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <title><?= $storesPagesTitles->title ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    echo $this->Html->charset();
    echo $this->Html->css(
        [
            '/front/assets/plugins/jquery-ui/jquery-ui.min.css',
            '/front/assets/plugins/bootstrap/css/bootstrap.min.css',
            '/front/assets/fontawesome-free-6.6.0-web/css/fontawesome.min.css',
            '/front/assets/fontawesome-free-6.6.0-web/css/brands.css',
            '/front/assets/fontawesome-free-6.6.0-web/css/solid.css',
            '/front/assets/plugins/selectbox/select_option1.css',
            '/front/assets/plugins/slick/slick.css',
            '/front/assets/plugins/slick/slick-theme.css',
            '/front/assets/plugins/prismjs/prism.css',
            '/front/assets/plugins/fancybox/jquery.fancybox.min.css',
            '/front/assets/plugins/isotope/isotope.min.css',
            '/front/assets/plugins/animate/animate.css',
            '/front/assets/plugins/daterangepicker/css/daterangepicker.css',
            '/front/assets/plugins/no-ui-slider/nouislider.min.css',
            '/front/assets/css/style.css'
        ]
    );

    ?>

    <link rel="shortcut icon" href="<?php echo $this->request->webroot . 'img/favicon.ico'; ?>">

</head>