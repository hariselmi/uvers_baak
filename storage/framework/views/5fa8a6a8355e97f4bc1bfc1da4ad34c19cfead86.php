<div class="" id="pagesTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo e(trans('pages.title')); ?></th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($value->nama); ?></td>
                    <td class="item_btn_group">
                        <?php
                            $actions = [
                                ['data-replace' => '#editPages', 'url' => '#editPagesModal', 'ajax-url' => url('pages/' . $value->id . '/edit'), 'name' => ' Sunting', 'icon' => 'pencil']
                            ];
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$pages, 'index_route'=>route('pages.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/pages/table.blade.php ENDPATH**/ ?>