<div class="modal-content" id="editMember">
    <?php if(!empty($member)): ?>
    <?php echo e(Form::model($member, ['route' => ['members.update', $member->id], 'method' => 'PUT', 'files' => true])); ?>

    <?php endif; ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">
        <?php echo e(__('Edit Anggota')); ?>

    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-10">
            <div class="form-group row">
                <?php echo e(Form::label('auditor_id', trans('member.chief_auditor') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('auditor_id', $auditor, null, ['id' => 'edit_auditor_id', 'class' => 'form-control', 'required', 'onchange' => 'getMembers(this.value)']); ?>

                </div>
            </div>
            <div class="form-group row">
                <?php echo e(Form::label('name', trans('member.member_name') . ' *', ['class' => 'col-sm-3 text-right'])); ?>

                <div class="col-sm-9">
                    <?php echo Form::select('users_id', $users, null, ['id' => 'edit_users_id', 'class' => 'form-control', 'required']); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?php if(!empty($page)): ?>
        <input type="hidden" name="page" value="<?php echo e($page); ?>" />
    <?php endif; ?>
    <?php echo e(Form::submit(trans('member.submit'), ['class' => 'btn btn-success'])); ?>

    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Tutup')); ?></button>
</div>
<?php echo e(Form::close()); ?>

</div><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/statuspendaftaran/formedit.blade.php ENDPATH**/ ?>