<div class="row mb-5">
    <div class="col-md-12">
        <section class="content">
            <div class="container-fluid">
                <h2 class="text-center display-4"><?= __("Buscar") ?></h2>
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="<?php echo $this->request->base; ?>/stores-courses/courses" method="get">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control form-control-lg">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="row">
            <?php foreach ($storesCourses as $storesCourse) : ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            <?= __("Produto Digital") ?>
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b><?= h($storesCourse->course) ?></b></h2>
                                    <p class="text-muted text-sm"><b><?= __("Autor") ?>: </b> <?= h($storesCourse->autor) ?> </p>
                                    <p class="text-muted text-sm"><b><?= __("Descrição") ?>: </b> <?= h($storesCourse->course) ?> </p>
                                </div>
                                <div class="col-5 text-center">
                                    <img class="img-circle img-fluid" <?= $storesCourse->photo ?> />
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="<?= $this->request->webroot . 'stores-courses/courseView/' . $storesCourse->id ?>" class="btn btn-sm btn-primary">
                                    <?= __("Ver Detalhes") ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
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
                <nav class="paginator" aria-label="Paginação">
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