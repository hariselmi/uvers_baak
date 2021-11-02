<div class="" id="statusPemrosesanTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo e(__('Beasiswa')); ?></th>
                <th><?php echo e(__('Nama')); ?></th>
                <th><?php echo e(__('NIM')); ?></th>
                <th><?php echo e(__('Prodi')); ?></th>
                <th><?php echo e(__('Status')); ?></th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $dataStatusPemrosesan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(Get_field::get_data($value->beasiswa_id, 'beasiswa', 'nama_paket')); ?></td>
                    <td><?php echo e(Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nama')); ?></td>
                    <td><?php echo e(Get_field::get_data($value->mahasiswa_id, 'mahasiswa', 'nim')); ?></td>
                    <td><?php echo e(Get_field::get_data($value->prodi, 'prodi', 'name')); ?></td>
                    <td><?php echo e(Get_field::get_data($value->status, 'status', 'name')); ?></td>
                    <td class="item_btn_group">
                        <?php
                        if (Auth::user()->role == 'admin') {
                            # code...
                            $actions = [
                                // ['data-replace' => '#showStatusPemrosesan', 'url' => '#showStatusPemrosesanModal', 'ajax-url' => url('statuspemrosesan/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                                ['data-replace' => '#editStatusPemrosesan', 'url' => '#editStatusPemrosesanModal', 'ajax-url' => url('statuspemrosesan/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'statuspemrosesan/' . $value->id, 'name' => 'delete']
                            ];
                        }else{
                            $actions = [
                                ['data-replace' => '#showStatusPemrosesan', 'url' => '#showStatusPemrosesanModal', 'ajax-url' => url('statuspemrosesan/' . $value->id . '/'), 'name' => ' Lihat', 'icon' => 'eye'], 
                            ];

                        }
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$dataStatusPemrosesan, 'index_route'=>route('statuspemrosesan.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/statuspemrosesan/table.blade.php ENDPATH**/ ?>