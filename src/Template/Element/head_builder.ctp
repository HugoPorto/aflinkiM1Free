<head>
    <meta charset="utf-8">

    <title>Fusion - Builder Page</title>

    <meta content="Fusion - Builder Page" name="description">

    <?php echo $this->Html->css(
        [
            '/grape/stylesheets/toastr.min.css',
            '/grape/stylesheets/grapes.min.css?v0.21.10',
            '/grape/stylesheets/grapesjs-preset-webpage.min.css',
            '/grape/stylesheets/tooltip.css',
            '/grape/stylesheets/demos.css?v3',
            '/grape/stylesheets/grapick.min.css',
        ]
    ); ?>

    <?php echo $this->Html->script(
        [
            '/grape/js/jquery.min.js',
            '/grape/js/toastr.min.js',
            '/grape/js/grapes.min.js?v0.21.10',
            '/grape/js/grapesjs-preset-webpage@1.0.2.js',
            '/grape/js/grapesjs-blocks-basic@1.0.1.js',
            '/grape/js/grapesjs-plugin-forms@2.0.5.js',
            '/grape/js/grapesjs-component-countdown@1.0.1.js',
            '/grape/js/grapesjs-plugin-export@1.0.11.js',
            '/grape/js/grapesjs-tabs.min.js',
            '/grape/js/grapesjs-custom-code@1.0.1.js',
            '/grape/js/grapesjs-touch.min.js',
            '/grape/js/grapesjs-parser-postcss@1.0.1.js',
            '/grape/js/grapesjs-tooltip@0.1.7.js',
            '/grape/js/grapesjs-tui-image-editor.min.js',
            '/grape/js/grapesjs-typed.min.js',
            '/grape/js/grapesjs-style-bg@2.0.1.js',
        ]
    ); ?>

    <style type="text/css">
        .icons-flex {
            background-size: 70% 65% !important;
            height: 15px;
            width: 17px;
            opacity: 0.9;
        }

        .icon-dir-row {
            background: url("./img/flex-dir-row.png") no-repeat center;
        }

        .icon-dir-row-rev {
            background: url("./img/flex-dir-row-rev.png") no-repeat center;
        }

        .icon-dir-col {
            background: url("./img/flex-dir-col.png") no-repeat center;
        }

        .icon-dir-col-rev {
            background: url("./img/flex-dir-col-rev.png") no-repeat center;
        }

        .icon-just-start {
            background: url("./img/flex-just-start.png") no-repeat center;
        }

        .icon-just-end {
            background: url("./img/flex-just-end.png") no-repeat center;
        }

        .icon-just-sp-bet {
            background: url("./img/flex-just-sp-bet.png") no-repeat center;
        }

        .icon-just-sp-ar {
            background: url("./img/flex-just-sp-ar.png") no-repeat center;
        }

        .icon-just-sp-cent {
            background: url("./img/flex-just-sp-cent.png") no-repeat center;
        }

        .icon-al-start {
            background: url("./img/flex-al-start.png") no-repeat center;
        }

        .icon-al-end {
            background: url("./img/flex-al-end.png") no-repeat center;
        }

        .icon-al-str {
            background: url("./img/flex-al-str.png") no-repeat center;
        }

        .icon-al-center {
            background: url("./img/flex-al-center.png") no-repeat center;
        }

        [data-tooltip]::after {
            background: rgba(51, 51, 51, 0.9);
        }

        .gjs-pn-commands {
            min-height: 40px;
        }

        #gjs-sm-float {
            display: none;
        }

        .gjs-logo-version {
            background-color: #756467;
        }

        .gjs-pn-btn.gjs-pn-active {
            box-shadow: none;
        }

        .CodeMirror {
            min-height: 450px;
            margin-bottom: 8px;
        }

        .grp-handler-close {
            background-color: transparent;
            color: #ddd;
        }

        .grp-handler-cp-wrap {
            border-color: transparent;
        }
    </style>
</head>