<?php if(is_admin()): ?>
	<img class="img-preview" src="<?php echo e(get_template_directory_uri()); ?>/Blocks/PACarouselDownloads/preview.png" alt='<?php echo e(__('Illustrative image of the front end of the block.', 'iasd')); ?>'/>
<?php else: ?>  
	<div class="pa-widget pa-carousel-download col-12 mb-5">
		<div class="pa-glide-downloads">
			<?php if (! empty($title)) : ?>
				<div class="d-flex mb-4">
					<h2 class="flex-grow-1"><?php echo $title; ?></h2>	
				</div>
			<?php endif; ?>

			<?php if (! empty($items)) : ?>
				<div class="glide__track" data-glide-el="track">
					<div class="glide__slides">
					<?php if(is_array($items)): ?>
						<?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="glide__slide">
								<div class="card shadow-sm border-0">
									<figure class="ratio ratio-16x9 bg-light rounded-bottom overflow-hidden">
										<?php if (! empty($item['featured_media_url'])) : ?>
											<img 
												class="card-img-top"	
												src="<?php echo e($item['featured_media_url']['pa_block_render']); ?>"  
												alt="<?php echo e($item['title']['rendered']); ?>" 
											/>
										<?php endif; ?>
									</figure>

									<div class="card-body pt-0">
										<?php if(!empty($item['file_format']) || !empty($item['file_size'])): ?>
											<div class="mb-3">
												<?php if (! empty($item['file_format'])) : ?>
													<span class="pa-tag text-uppercase me-1 rounded"><?php echo e($item['file_format']); ?></span>
												<?php endif; ?>
												
												<?php if (! empty($item['file_size'])) : ?>
													<span class="pa-tag text-uppercase rounded"><?php echo e($item['file_size']); ?></span>
												<?php endif; ?>
											</div>
										<?php endif; ?>

										<?php if (! empty($item['title'])) : ?>
                    <a 
											class="stretched-link"
											href="<?php echo e(is_array($item['link']) ? $item['link']['url'] : $item['link']); ?>" 
											target="<?php echo e(is_array($item['link']) && !empty($item['link']['target']) ? $item['link']['target'] : '_self'); ?>"
										>
											<h3 class="card-title fw-bold h6"><?php echo $item['title']['rendered']; ?></h3>
                    </a>
										<?php endif; ?>										
									</div>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
<?php /**PATH /Users/clecyo.freitas/Documents/Dev_DSA/deploy-adventistas.org.git/app/es/wp-content/themes/pa-theme-sedes/Blocks/PACarouselDownloads/views/frontend.blade.php ENDPATH**/ ?>