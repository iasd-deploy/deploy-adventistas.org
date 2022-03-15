<?php if(is_admin()): ?>
  <img class="img-preview" src="<?php echo e(get_template_directory_uri()); ?>/Blocks/PAImage/preview.png" alt="<?php echo e(__('Illustrative image of the front end of the block.', 'iasd')); ?>" />
<?php else: ?>
	<div class="pa-widget pa-w-image col mt-5 <?php echo e($block_format == '1/3' ? 'col-md-4' : ($block_format == '2/3' ? 'col-md-8' : '')); ?>">
    <?php if (! empty($link)) : ?>
      <a 
        href="<?php echo e($link['url']); ?>"
        target="<?php echo e(!empty($link['target']) ? $link['target'] : '_self'); ?>"
      >
    <?php endif; ?>
		
    <?php if (! empty($image)) : ?>
      <img 
        class="img-fluid" 
        src="<?php echo e(wp_get_attachment_image_url($image, 'full')); ?>"
        alt="<?php echo e(!empty($alt = get_post_meta($image, '_wp_attachment_image_alt', true)) ? $alt : get_the_title($image)); ?>"
      />
		<?php endif; ?>
    
    <?php if (! empty($link)) : ?>
      </a>
    <?php endif; ?>
	</div>
<?php endif; ?>
<?php /**PATH /Users/isaltino/Git/deploy-adventistas.org/app/pt/wp-content/themes/pa-theme-sedes/Blocks/PAImage/views/frontend.blade.php ENDPATH**/ ?>