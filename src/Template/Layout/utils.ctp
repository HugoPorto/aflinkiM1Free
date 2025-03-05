<?= $this->layout = false ?>

<!doctype html>

<html lang="pt-br" itemscope itemtype="https://schema.org/WebSite">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
        content="Site onde você pode gerar diversos modelos de recibos de pagamento, assim como senhas e outros...">

    <title>Aflinki | Suite</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous">

    <?= $this->request->action == 'passGenerator' ? $this->element('utils_style_pass_generator') : '' ?>

    <meta name="Keywords"
        content="recibo, nota promissória, senhas, recibo de salário, gerador,
        uppercase, lowercase, recibo aluguel, ordem de serviço, recibo com logotipo,
        recibo com logo, recibo simples, recibo online" />

    <link rel="publisher" href="https://fb.me/aflinki.com" />

    <meta name="copyright" content="©2022 Aflinki" />

    <link rel="canonical" href="https://www.aflinki.com/" />

    <link rel="base" href="https://www.aflinki.com/">

    <meta itemprop="name"
        content="Recibos, senhas, promissórias, uppercase, lowercase, ordem de serviço | Aflinki | Recibo Online" />

    <meta itemprop="image" content="https://www.aflinki.com/images/aflinki.png" />

    <meta itemprop="url" content="https://www.aflinki.com/" />

    <meta property="og:type" content="website" />

    <meta property="og:locale" content="pt_BR" />

    <meta property="og:locale:alternate" content="pt_PT" />

    <meta property="og:title" content="Recibos, promissórias, ordem de serviço | Recibo Online" />

    <meta property="og:url" content="https://www.aflinki.com/" />

    <meta property="og:site_name" content="Aflinki | Suite" />

    <meta property="og:image" content="https://www.aflinki.com/images/aflinki.png" />

    <meta property="og:image:type" content="image/png" />

    <meta property="og:image:width" content="600" />

    <meta property="og:image:height" content="315" />

    <meta property="og:description"
        content="Site onde você pode gerar diversos modelos de recibos de pagamento, assim como senhas e outros...">

    <?= $this->Html->meta('icon', 'img/favicon.png', ['type' => 'image/png']) ?>

    <?= $this->Html->css(
        [
            '/utils/receipts.css',
        ]
    ); ?>

    <link rel="base" href="https://www.aflinki.com/" />

</head>

<body>

    <?= $this->element('utils_navbar') ?>

    <div class="container py-3">
        <?= $this->fetch('content') ?>
    </div>
    <footer class="bg-dark text-light">
        <div class="text-center" style="background-color: #333; padding: 20px;">
            &copy 2022 Copyright: Aflinki
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>

    <?php if ($this->request->action == 'passGenerator') : ?>
        <?= $this->element('utils_script_pass_generator') ?>
    <?php endif; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"
        type="text/javascript">
    </script>

    <script src="https://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js"
        type="text/javascript">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.10.5/jquery.mask.min.js"
        integrity="sha512-axSj1bvbwE01scMl16FqQOP41PM4bX1KxSh1awf6L/+CpvC/8ju1zM13x2cqfk5Hr8kl/RQgd1rz+6UepbCAUA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
    </script>

    <?php if ($this->request->action == 'receipts') : ?>
        <script>
            jQuery(function() {

                jQuery("#valor").maskMoney({
                    prefix: 'R$ ',
                    thousands: '.',
                    decimal: ','
                })

            });

            $("#cpfcnpj").keydown(function() {
                try {
                    $("#cpfcnpj").unmask();
                } catch (e) {}

                var tamanho = $("#cpfcnpj").val().length;

                if (tamanho < 11) {
                    $("#cpfcnpj").mask("999.999.999-99");
                } else {
                    $("#cpfcnpj").mask("99.999.999/9999-99");
                }
            });

            $("#cpfcnpjemissor").keydown(function() {
                try {
                    $("#cpfcnpjemissor").unmask();
                } catch (e) {}

                var tamanho = $("#cpfcnpjemissor").val().length;

                if (tamanho < 11) {
                    $("#cpfcnpjemissor").mask("999.999.999-99");
                } else {
                    $("#cpfcnpjemissor").mask("99.999.999/9999-99");
                }
            });

            $('#telefone').each(function(i, el) {
                $('#' + el.id).mask("(00) 00000-0000");
            });

            function updateMask(event) {
                var $element = $('#' + this.id);
                $(this).off('blur');
                $element.unmask();
                if (this.value.replace(/\D/g, '').length > 10) {
                    $element.mask("(00) 00000-0000");
                } else {
                    $element.mask("(00) 0000-00009");
                }
                $(this).on('blur', updateMask);
            }

            $('#telefone').on('blur', updateMask);
        </script>

    <?php endif; ?>
</body>

</html>