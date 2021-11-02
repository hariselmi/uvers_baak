<div class="" id="articleTable">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th><?php echo e(trans('article.category')); ?></th>
                <th><?php echo e(trans('article.title')); ?></th>
                <th><?php echo e(trans('article.date')); ?></th>
                <th><?php echo e(trans('article.thumbnail')); ?></th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <?php if($value->category == 1 ): ?>
                            Halaman Utama
                        <?php elseif($value->category == 2): ?>
                            Informasi Kemahasiswaan
                        <?php elseif($value->category == 3): ?>
                            Kegiatan kemahasiswaan
                        <?php else: ?>
                            Informasi Beasiswa
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($value->title); ?></td>
                    <td><?php echo e(date('d-m-Y', strtotime($value->date))); ?></td>
                    <td><img src="<?php echo e(asset('/images/article/'.$value->thumbnail )); ?>" alt="" width="auto" height="100px"></td>
                    <td class="item_btn_group">
                        <?php
                            $actions = [
                                ['data-replace' => '#editArticle', 'url' => '#editArticleModal', 'ajax-url' => url('articles/' . $value->id . '/edit'), 'name' => ' Ubah', 'icon' => 'pencil'],
                                ['url' => 'articles/' . $value->id, 'name' => 'delete']
                            ];
                        ?>
                        <?php echo $__env->make('partials.actions', ['actions'=>$actions], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo $__env->make('partials.pagination', ['items'=>$articles, 'index_route'=>route('articles.index')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/article/table.blade.php ENDPATH**/ ?>