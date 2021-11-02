<div class="" id="nonLombaTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo e(__('Nama Kegiatan')); ?></th>
                <th><?php echo e(__('Peran')); ?></th>
                <th><?php echo e(__('Penyelenggara')); ?></th>
                <th><?php echo e(__('Tanggal Mulai')); ?></th>
                <th><?php echo e(__('Tanggal Akhir')); ?></th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $dataNonLomba; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($value->nama_kegiatan); ?></td>
                    <td><?php echo e($value->peran); ?></td>
                    <td><?php echo e($value->penyelenggara); ?></td>
                    <td><?php echo e($value->tgl_mulai); ?></td>
                    <td><?php echo e($value->tgl_selesai); ?></td>
                    <td class="item_btn_group">
                        <?php
                            $actions = [
                                ['data-replace' => '#showNonLomba', 'url' => '#showNonLombaModal', 'ajax-url' => url('nonlomba/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editNonLomba', 'url' => '#editNonLombaModal', 'ajax-url' => url('nonlomba/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'nonlomba/' . $value->id, 'name' => 'delete']
                            ];
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$dataNonLomba, 'index_route'=>route('nonlomba.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/nonlomba/table.blade.php ENDPATH**/ ?>