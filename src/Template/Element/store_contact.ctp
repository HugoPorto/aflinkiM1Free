<section class="contact">
    <div class="container">
        <div class="contact_item-container">
            <div class="row justify-content-center justify-content-lg-between">
                <div class="col-md-4">
                    <div class="">
                        <h3><?= __("QUEM SOMOS") ?></h3>
                        <p style="font-size: 14px; text-align: justify">
                            <?= h($storesAbouts->about) ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="">
                        <h3><?= __("HORÁRIOS") ?></h3>
                        <p style="font-size: 14px; text-align: justify">
                            <?= h($storesHours->hour) ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <h3><?= __("CONTATO") ?></h3>
                        <p style="font-size: 14px; text-align: justify">
                            <?= h($storesContacts->contact) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>