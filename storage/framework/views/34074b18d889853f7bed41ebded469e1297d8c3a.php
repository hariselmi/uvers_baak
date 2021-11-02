<div class="modal-content" id="addStatusPemrosean">
    <?php echo e(Form::open(['url' => 'statuspemrosesan', 'files' => true])); ?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        <?php echo e(__('Tambah Status Pemrosesan')); ?>

    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            
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

<script>

    $('#kategori, #jenisKepesertaan').select2({
        width:'100%'
    });

</script>

<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/statuspemrosesan/formadd.blade.php ENDPATH**/ ?>