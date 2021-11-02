<div class="" id="slidersTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo e(trans('sliders.title')); ?></th>
                <th><?php echo e(trans('sliders.thumbnail')); ?></th>
                <th><?php echo e(trans('sliders.status')); ?></th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center"><?php echo e($value->title); ?></td>
                    <td class="text-center"><img src="<?php echo e(asset('/images/slider/'.$value->thumbnail )); ?>" alt="" width="auto" height="100px"></td>
                    <td class="text-center">
                        <?php if($value->status == 1 ): ?>
                            Active
                        <?php else: ?>
                            Non Active
                        <?php endif; ?>
                    </td>
                    <td class="item_btn_group">
                        <?php
                            $actions = [
                                ['data-replace' => '#editSliders', 'url' => '#editSlidersModal', 'ajax-url' => url('sliders/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'sliders/' . $value->id, 'name' => 'delete']
                            ];
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$sliders, 'index_route'=>route('sliders.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/sliders/table.blade.php ENDPATH**/ ?>