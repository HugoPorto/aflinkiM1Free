<?php $this->layout = false; ?>

<!DOCTYPE html>
<html>

<head>
    <title><?= h($storesPagesTitles->title) ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }
    </style>

    <link rel="shortcut icon" href="<?php echo $this->request->webroot . 'img/favicon.png'; ?>">
</head>

<body>

    <div class="container">
        <h3 style="text-align: center;"><?= __("Pagamento") ?></h3><br />
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default credit-card-box">
                    <div class="panel-body">

                        <?= $this->Form->create(null, [
                            "url" => $this->Url->build("/payment", ["fullBase" => true, "escape" => false]),
                            "method" => "post"
                        ]) ?>

                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit"><?= __("Pagar agora") ?> (<?= __("R$") ?><?= h($total) ?>)</button>
                            </div>
                        </div>

                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>