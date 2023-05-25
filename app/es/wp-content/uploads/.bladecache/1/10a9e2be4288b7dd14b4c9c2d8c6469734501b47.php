<?php if(is_admin()): ?>
	<img class="img-preview" src="<?php echo e(get_template_directory_uri()); ?>/Blocks/PAFacebook/preview.png" alt="<?php echo e(__('Illustrative image of the front end of the block.', 'iasd')); ?>" />
<?php else: ?>
	<div class="pa-widget pa-w-facebook col-12 col-md-4 mb-5">
		<?php if (! empty($title)) : ?>
			<h2><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php if (! empty($url)) : ?>
    <div class="mt-4 mh-50">
			<div 
				data-href=<?php echo e($url); ?>

				class="fb-page" 
				data-tabs="timeline" 
				data-height="" 
				data-small-header="false" 
				data-adapt-container-width="true"
				data-hide-cover="false" 
				data-width="500" 
				data-show-facepile="true"
				data-lazy="true"
			></div>
    </div>
		<?php endif; ?>
	</div>
<?php endif; ?>
<?php /**PATH /var/www/html/es/wp-content/themes/pa-theme-sedes/Blocks/PAFacebook/views/frontend.blade.php ENDPATH**/ ?>