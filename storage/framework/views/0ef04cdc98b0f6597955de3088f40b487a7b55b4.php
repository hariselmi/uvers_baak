<div class="" id="mahasiswaTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo e(__('NPM')); ?></th>
                <th><?php echo e(__('Nama')); ?></th>
                <th><?php echo e(__('Prodi')); ?></th>
                <th><?php echo e(__('Tempat, Tanggal Lahir')); ?></th>
                <th><?php echo e(__('Alamat')); ?></th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $dataMahasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($value->nim); ?></td>
                    <td><?php echo e($value->nama); ?></td>
                    <td><?php echo e(Get_field::get_data($value->prodi, 'prodi', 'name')); ?></td>
                    <td><?php echo e($value->tempat_lahir); ?>, <?php echo e($value->tgl_lahir); ?></td>
                    <td><?php echo e($value->alamat); ?></td>
                    <td class="item_btn_group">
                        <?php
                            $actions = [
                                ['data-replace' => '#showMahasiswa', 'url' => '#showMahasiswaModal', 'ajax-url' => url('mahasiswa/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editMahasiswa', 'url' => '#editMahasiswaModal', 'ajax-url' => url('mahasiswa/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'mahasiswa/' . $value->id, 'name' => 'delete']
                            ];
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$dataMahasiswa, 'index_route'=>route('mahasiswa.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/mahasiswa/table.blade.php ENDPATH**/ ?>