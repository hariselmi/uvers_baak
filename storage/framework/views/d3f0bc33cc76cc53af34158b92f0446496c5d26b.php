<?php echo $__env->make('landing.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



<!-- Latest News -->
<div class="section section-news section-pad">
    <div class="container">
        <?php echo Get_field::get_data('4', 'pages', 'content'); ?>


			
        <?php $__currentLoopData = $articles_utama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 

        <div class="post post-boxed col-sm-4 res-s-bttm-lg mt-x2">
            <div class="post-thumbs">
                <a href="/articles_details/<?php echo e($value->id); ?>"><img alt="" src="<?php echo e(asset('images/article')); ?>/<?php echo $value->thumbnail; ?>"></a>
                <div class="post-meta"><span class="pub-date"><strong><?php echo e(date('d',strtotime($value->date))); ?></strong> <?php echo e(date('m',strtotime($value->date))); ?></span></div>
            </div>
            <div class="post-entry">
                <h3><a href="/articles_details/<?php echo e($value->id); ?>"><?php echo $value->title; ?></a></h3>




                <p class="alignjustify"><?php echo $value->content; ?></p>
                <a class="btn-link link-arrow-sm" href="/articles_details/<?php echo e($value->id); ?>">Read More</a>
            </div>
        </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        

    </div>
</div>
<!-- End Section -->
<!-- Latest News -->
<!-- End Section -->
<?php echo $__env->make('landing.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/landing/landing.blade.php ENDPATH**/ ?>