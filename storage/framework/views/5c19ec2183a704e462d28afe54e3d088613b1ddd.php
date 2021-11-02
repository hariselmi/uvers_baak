<?php echo $__env->make('landing.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- Content -->
	<div class="section section-blog section-pad">
		<div class="container">
			<div class="content row">
			
				<div class="blog-wrapper row">
					<div class="col-md-8 res-m-bttm">

						<div class="post post-single">
							<div class="post-thumbs">
								<img alt="" src="<?php echo e(asset('images/article')); ?>/<?php echo $articles->thumbnail; ?>">
							</div>
							<div class="post-meta">
								<span class="pub-date"><em class="fa fa-calendar" aria-hidden="true"></em> <?php echo e(date('d M	, Y',strtotime($articles->date))); ?> </span>
							</div>
							<div class="post-entry">
								<h1><?php echo $articles->title; ?></h1>
								<?php echo $articles->content; ?>

							</div>
						</div>
						
					</div>

<!-- Sidebar -->
					<div class="col-md-4">
						<div class="sidebar-right">
							<div class="wgs-box wgs-recents">
								<h3 class="wgs-heading">Recent Posts</h3>
								<div class="wgs-content">
									<ul class="blog-recent">
										  <?php $__currentLoopData = $recent_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
										<li>
											<a href="/articles_details/<?php echo e($value->id); ?>">
												<img alt="/articles_details/<?php echo e($value->id); ?>" src="<?php echo e(asset('images/article')); ?>/<?php echo $value->thumbnail; ?>">
												<p><?php echo $value->title; ?></p>
											</a>
										</li>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</ul>
								</div>
							</div>

						

						</div>
					</div>
					<!-- Sidebar #end -->
				</div>

			</div>
		</div>
	</div>
	<!-- End Content -->
<?php echo $__env->make('landing.foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/n0ob/Documents/IT/Private/project/uvers/simak_uvers/resources/views/landing/articles_details.blade.php ENDPATH**/ ?>