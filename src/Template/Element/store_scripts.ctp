<?php

echo $this->Html->script(
    [
        '/axios/axios.min.js',
        '/front/assets/plugins/jquery/jquery-3.3.1.min.js',
        '/front/assets/plugins/jquery-ui/jquery-ui.min.js',
        '/front/assets/plugins/bootstrap/js/bootstrap.bundle.min.js',
        '/front/assets/plugins/selectbox/jquery.selectbox-0.1.3.min.js',
        '/front/assets/plugins/slick/slick.min.js',
        '/front/assets/plugins/fancybox/jquery.fancybox.min.js',
        '/front/assets/plugins/circle-progress/jquery.appear.js',
        '/front/assets/plugins/isotope/isotope.min.js',
        '/front/assets/plugins/datepicker/bootstrap-datepicker.min.js',
        '/front/assets/plugins/counterUp/counterup.min.js',
        '/front/assets/plugins/syotimer/jquery.syotimer.min.js',
        '/front/assets/plugins/daterangepicker/js/moment.min.js',
        '/front/assets/plugins/daterangepicker/js/daterangepicker.min.js',
        '/front/assets/plugins/images-loaded/js/imagesloaded.pkgd.min.js',
        '/front/assets/plugins/no-ui-slider/nouislider.min.js',
        '/front/assets/js/store.js',
        '/front/assets/js/preloader.js',
        '/front/assets/js/cookies.js'
    ]
);

if ($this->request->controller === 'Homes' && $this->request->action === 'productView') {
    echo $this->Html->script('/page_scripts/pure.js');
}

?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDU79W1lu5f6PIiuMqNfT1C6M0e_lq1ECY"></script>

<script>
    // $(document).ready(function() {
    //     $('#modelBeta').modal('show');
    // });

    function facebook() {
        var link = window.location.href;

        window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(link), '_blank');
    }
</script>