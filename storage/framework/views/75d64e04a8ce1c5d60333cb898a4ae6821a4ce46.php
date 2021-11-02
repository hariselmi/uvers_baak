<div class="modal-content" id="editPages">
    <?php echo e(Form::model($pages, ['route' => ['pages.update', $pages->id], 'method' => 'PUT', 'files' => true])); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        <?php echo e(__('Edit Halaman')); ?>

    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">

             <div class="form-group row">
                <?php echo e(Form::label('title', trans('pages.title') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::text('nama', null, ['id' => 'nama', 'class' => 'form-control', 'required'])); ?>

                </div>
            </div>

            <div class="form-group row">
                <?php echo e(Form::label('content', trans('article.content') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo e(Form::textarea('content', null, ['id' => 'edit_content','class' => 'form-control', 'required'])); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php if(!empty($page)): ?>
        <input type="hidden" name="page" value="<?php echo e($page); ?>" />
    <?php endif; ?>
    <?php echo e(Form::submit(trans('submit'), ['class' => 'btn btn-success'])); ?>

    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Tutup')); ?></button>
</div>
<?php echo e(Form::close()); ?>

</div>

<?php if(!empty($pages)): ?>
    
    <script>
        CKEDITOR.replace( 'edit_content' );
    </script>
<?php endif; ?>

<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/pages/formedit.blade.php ENDPATH**/ ?>