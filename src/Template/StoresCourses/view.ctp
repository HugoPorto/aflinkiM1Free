<?php if ($this->request->session()->check('Flash.flash')) : ?>
    <section class="content">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title"><?= __("Atenção") ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <?= $this->Flash->render() ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<div class="row">
    <div class="col-md-12">
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="col-12">
                            <img class="product-image" alt="Imagem do Curso" <?= $storesCourse->photo ?> />
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= h($storesCourse->course) ?></h3>
                        <p><?= h($storesCourse->description) ?></p>

                        <hr>
                        <h4><?= __("Autor") ?></h4>
                        <p><?= h($storesCourse->autor) ?></p>

                        <h4 class="mt-3">Tema</h4>
                        <p><?= h($storesCourse->theme) ?></p>

                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                R$<?= h($storesCourse->price) ?>
                            </h2>
                            <?php
                            // <h4 class="mt-0">
                            //     <small>Ex Tax: $80.00 </small>
                            // </h4>
                            ?>
                        </div>

                        <div class="mt-4">
                            <?= $this->Html->link(__('<i class="fa fa-edit"></i> Editar Curso'), ['action' => 'edit', $storesCourse->id], ['class' => 'btn bg-primary btn-lg btn-flat', 'escape' => false]) ?>
                        </div>

                        <?php
                        // <div class="mt-4 product-share">
                        //     <a href="#" class="text-gray">
                        //         <i class="fab fa-facebook-square fa-2x"></i>
                        //     </a>
                        //     <a href="#" class="text-gray">
                        //         <i class="fab fa-twitter-square fa-2x"></i>
                        //     </a>
                        //     <a href="#" class="text-gray">
                        //         <i class="fas fa-envelope-square fa-2x"></i>
                        //     </a>
                        //     <a href="#" class="text-gray">
                        //         <i class="fas fa-rss-square fa-2x"></i>
                        //     </a>
                        // </div>
                        ?>
                    </div>
                </div>
                <div class="row mt-4">
                    <nav class="w-100">
                        <div class="nav nav-tabs" id="product-tab" role="tablist">
                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true"><?= __("Ementa") ?></a>
                            <?php
                            // <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                            // <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                            ?>
                        </div>
                    </nav>
                    <div class="tab-content p-3" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                            <?php if (!empty($storesMenu)) : ?>
                                <div class="card">
                                    <div class="card-body">
                                        <ol>
                                            <?php foreach ($storesMenu as $menu) : ?>
                                                <li><?= $menu->menu ?></li>
                                            <?php endforeach; ?>
                                        </ol>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <?php
                        // <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                        // <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>