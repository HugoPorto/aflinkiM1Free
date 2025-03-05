<?php if ($slide) :?>
<div class="card card-custom">
    <div class="card-body">
        <div class="row">
            <div class=col-md-8>

                <div class="video-container" style="margin-top: 5px">
                    <?= $slide->slide ?>
                </div>

            </div>
        </div>
        <div class="margin">
            <table class="vertical-table table table-borderless table-sm table_view">
                <tr>
                    <th scope="row"><?= __('Curso') ?></th>
                    <td><?= $slide->has('stores_course') ? $slide->stores_course->course : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php else :?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Atenção</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        </div>
    </div>
    <div class="card-body">
        Esse curso não possui slide
    </div>
</div>

<?php endif;?>
