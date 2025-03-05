<div class="row">
    <div class="col-md-8 col-lg-12 col-xs-12">
        <div class="row">
            <?php if (!empty($storesCourses->toArray())) : ?>
                <?php foreach ($storesCourses as $storesCourse) : ?>
                    <div class="col-md-6 col-lg-2">
                        <div class="card product-card">
                            <div class="card_img">
                                <img class="img-fluid" style="margin: auto; display: block;" <?= $storesCourse->photo; ?> />
                                <div class="hover-overlay">
                                    <?= $this->Html->link(
                                        __('<i class="fa fa-cart-shopping"></i>'),
                                        ['action' => 'courseView', $storesCourse->id],
                                        ['class' => 'overlay_icon right', 'escape' => false]
                                    ) ?>
                                </div>
                            </div>
                            <div class="card-body">
                                <a href="<?= $this->request->base ?>/homes/courseView/<?= $storesCourse->id; ?>">
                                    <h4 class="card-title"><?= h($storesCourse->course) ?></h4>
                                </a>
                                <span class="text-info">R$<?= h($storesCourse->price) ?></span>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-md-6 col-lg-6">
                    <div class="card product-card">
                        <h3><?= __("Não foram encontrados registros.") ?></h3>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php $paginator = $this->Paginator->setTemplates(
            [
                'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'current' => '<li class="page-item active"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                'first' => '<li class="page-item"><a class="page-link" href="{{url}}">&laquo;</a></li>',
                'last' => '<li class="page-item"><a class="page-link" href="{{url}}">&raquo;</a></li>',
                'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&lt;</a></li>',
                'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">&gt;</a></li>',
            ]
        ); ?>

        <div class="row">
            <div class="col-md-12">
                <nav class="paginator" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center"">
                        <?= $this->Paginator->first() ?>

                        <?php if ($this->Paginator->hasPrev()) : ?>
                            <?= $this->Paginator->prev() ?>

                        <?php endif; ?>

                        <?= $this->Paginator->numbers() ?>

                        <?php if ($this->Paginator->hasNext()) : ?>
                            <?= $this->Paginator->next() ?>

                        <?php endif; ?>

                        <?= $this->Paginator->last() ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>