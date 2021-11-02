<div class="" id="identityTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Facebook</th>
                <th>WhatsApp</th>
                <th>Instagram</th>
                <th>Email</th>
                <th>Telepon</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $identity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($value->nama); ?></td>
                    <td><?php echo e($value->facebook); ?></td>
                    <td><?php echo e($value->whatsapp); ?></td>
                    <td><?php echo e($value->instagram); ?></td>
                    <td><?php echo e($value->email); ?></td>
                    <td><?php echo e($value->phone); ?></td>
                    <td class="item_btn_group">
                        <?php
                            $actions = [
                                ['data-replace' => '#editIdentity', 'url' => '#editIdentityModal', 'ajax-url' => url('identity/' . $value->id . '/edit'), 'name' => ' Sunting', 'icon' => 'pencil']
                            ];
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/identity/table.blade.php ENDPATH**/ ?>