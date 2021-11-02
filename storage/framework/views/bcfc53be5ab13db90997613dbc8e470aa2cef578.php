<div class="" id="skpiTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo e(__('NIM')); ?></th>
                <th><?php echo e(__('Nama')); ?></th>
                <th><?php echo e(__('Jenis Pelaporan')); ?></th>
                <th><?php echo e(__('Golongan SKPI')); ?></th>
                <th><?php echo e(__('Nama Kegiatan')); ?></th>
                <th><?php echo e(__('Peran')); ?></th>
                <th><?php echo e(__('Penyelenggara')); ?></th>
                <th><?php echo e(__('Tanggal Mulai')); ?></th>
                <th><?php echo e(__('Tanggal Akhir')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $dataSkpi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nim')); ?></td>
                    <td><?php echo e(Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nama')); ?></td>
                    <td><?php echo e(Get_field::get_data($value->jenis_aktivitas, 'kategori_pelaporan', 'name')); ?></td>
                    <td><?php echo e(Get_field::get_data($value->golongan_skpi_id, 'golongan_skpi', 'name')); ?></td>
                    <td><?php echo e($value->nama_kegiatan); ?></td>
                    <td><?php echo e($value->peran); ?></td>
                    <td><?php echo e($value->penyelenggara); ?></td>
                    <td><?php echo e($value->tgl_mulai); ?></td>
                    <td><?php echo e($value->tgl_selesai); ?></td>
                    <td><?php echo e(Get_field::get_data($value->status, 'status', 'name')); ?></td>
                    <td class="item_btn_group">
                        <?php
                            $actions = [
                                ['data-replace' => '#showSkpi', 'url' => '#showSkpiModal', 'ajax-url' => url('skpi/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editSkpi', 'url' => '#editSkpiModal', 'ajax-url' => url('skpi/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                // ['url' => 'skpi/' . $value->id, 'name' => 'delete']
                            ];
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$dataSkpi, 'index_route'=>route('skpi.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/skpi/table.blade.php ENDPATH**/ ?>