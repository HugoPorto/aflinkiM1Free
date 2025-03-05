<section class="single_item single-item-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <form method="post" action="<?= $this->request->base . '/homes/builder-accepts' ?>">
                    <input
                            type="hidden"
                            class="form-control"
                            name="_csrfToken"
                            value="<?= $this->request->getParam('_csrfToken'); ?>"/>

                    <br>
                    <button type="submit" class="btn btn-primary-outlined btn-default">Solicitar</button>
                </form>
            </div>
        </div>
    </div>
</section>
