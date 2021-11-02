<div class="" id="memberTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo e(__('Nama Kegiatan')); ?></th>
                <th><?php echo e(__('Kategori Kegiatan')); ?></th>
                <th><?php echo e(__('Peran')); ?></th>
                <th><?php echo e(__('Jenis Kepesertaan')); ?></th>
                <th><?php echo e(__('Capaian Prestasi')); ?></th>
                <th><?php echo e(__('Keterangan')); ?></th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(Get_field::get_data($value->auditor_id, 'users', 'name')); ?></td>
                    <td><?php echo e(Get_field::get_data($value->users_id, 'users', 'name')); ?></td>
                    <td><?php echo e($value->email); ?></td>
                    <td class="hidden-xs"><?php echo e($value->telp); ?></td>
                    <td class="hidden-xs"><?php echo e($value->telp); ?></td>
                    <td class="item_btn_group">
                        <?php
                            $actions = [
                                ['data-replace' => '#showMember', 'url' => '#showMemberModal', 'ajax-url' => url('ekspor/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editMember', 'url' => '#editMemberModal', 'ajax-url' => url('ekspor/' . $value->id . '/edit'), 'name' => ' Sunting', 'icon' => 'pencil'],
                                ['url' => 'ekspor/' . $value->id, 'name' => 'delete']
                            ];
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$members, 'index_route'=>route('ekspor.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/ekspor/table.blade.php ENDPATH**/ ?>