<div class="row">
    
    <?php foreach ($storesVideos as $video) : ?>
        <div class="col-4">

            <div class="invoice p-3 mb-3">
                
                <div class="row">

                    <div class="col-12">

                        <p>
                            <?= $this->Html->link(
                                '<i class="fas fa-video"></i> ' . $video->title,
                                ['action' => 'video', $this->Tools->encryptParam($video->id)],
                                ['escape' => false]
                            ) ?>                            
                        </p>

                    </div>

                </div>
                
                <div class="card-body p-0">

                    <div class="col-md-12 p-0">

                        <?= $this->Html->link(
                            '<img class="img-fluid"' . $video->photo . '/>',
                            ['action' => 'video', $this->Tools->encryptParam($video->id)],
                            ['escape' => false]
                        ) ?>

                    </div>

                </div>

                <br>

                <?php
                // <div class="row no-print">
                //     <div class="col-12">
                //         <button type="button" class="btn btn-success float-right">
                //         <i class="far fa-credit-card"></i> Comprar</button>
                //     </div>
                // </div>
                ?>
                
            </div>

        </div>

    <?php endforeach; ?>

</div>