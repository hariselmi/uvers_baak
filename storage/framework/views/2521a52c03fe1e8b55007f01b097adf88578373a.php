<div class="" id="pendaftaranTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo e(__('No')); ?></th>
                <th><?php echo e(__('Nama Paket')); ?></th>
                <th><?php echo e(__('Deskrpsi')); ?></th>
                <th><?php echo e(__('Status Pendaftaran')); ?></th>
                <th><?php echo e(__('Periode Pendaftaran')); ?></th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $dataPendaftaranBeasiswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key+1); ?></td>
                    <td><?php echo e($value->nama_paket); ?></td>
                    <td><?php echo e($value->deskripsi); ?></td>
                    <td><?php echo e(Get_field::get_data($value->status_pendaftaran, 'status_pendaftaran', 'name')); ?></td>
                    <td><?php echo e($value->tgl_mulai_periode); ?> s.d <?php echo e($value->tgl_sampai_periode); ?></td>
                    <td class="item_btn_group">
                        <?php

                        $userRole   = Auth::user()->role;

                        if ($userRole != 'admin') {
                            # code...
                            $actions = [
                                ['data-replace' => '#daftarPendaftaranBeasiswa', 'url' => '#daftarPendaftaranBeasiswaModal', 'ajax-url' => url('pendaftaran/' . $value->id . '/daftar'), 'name' => ' Daftar', 'icon' => 'clipboard'], 
                            ];
                        } else {
                            # code...
                            $actions = [
                                ['data-replace' => '#daftarPendaftaranBeasiswa', 'url' => '#daftarPendaftaranBeasiswaModal', 'ajax-url' => url('pendaftaran/' . $value->id . '/daftar'), 'name' => ' Daftar', 'icon' => 'clipboard'], 
                                ['data-replace' => '#editPendaftaranBeasiswa', 'url' => '#editPendaftaranBeasiswaModal', 'ajax-url' => url('pendaftaran/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'pendaftaran/' . $value->id, 'name' => 'delete']
                            ];
                        }
        
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$dataPendaftaranBeasiswa, 'index_route'=>route('pendaftaran.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/pendaftaran/table.blade.php ENDPATH**/ ?>