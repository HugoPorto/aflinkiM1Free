<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $storesPagesTitles->title ?></title>

    <?= $this->Html->css(
        [
            '/adminlte/plugins/fontawesome-free/css/all.min.css',
            'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
            '/adminlte/dist/css/adminlte.min.css',
            '/adminlte/plugins/select2/css/select2.min.css',
            '/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css',
            '/adminlte/plugins/daterangepicker/daterangepicker.css',
            '/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css',
            '/adminlte/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css',
            '/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
            '/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
            '/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
            '/adminlte/plugins/bs-stepper/css/bs-stepper.min.css',
            '/adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css',
            '/adminlte/plugins/dropzone/min/dropzone.min.css',
            '/adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
            '/adminlte/plugins/toastr/toastr.min.css',
            '/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
            '/css/index_style.css',
        ]
    ); ?>

    <?= $this->Html->meta('icon', 'img/favicon.ico', ['type' => 'image/ico']) ?>

</head>