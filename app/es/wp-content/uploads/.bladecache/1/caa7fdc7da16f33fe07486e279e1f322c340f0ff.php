<?php if(is_admin()): ?>
  <img class="img-preview" src="<?php echo e(get_template_directory_uri()); ?>/Blocks/PAFindChurch/preview.png" alt="<?php echo e(__('Illustrative image of the front end of the block.', 'iasd')); ?>" />
<?php else: ?>
	<div class="pa-widget pa-find-church col-12 mb-5 position-relative">
    <div class="row py-5 px-3 px-xl-5">
      <div class="col-md-5 text-center text-md-start">
        <h1><?php echo e(__('Finding a church', 'iasd')); ?></h1>
        <p><?php echo e(__('Adventist churches that are located in the South American Division.', 'iasd')); ?></p>

        <form class="pt-4 pt-xl-3 d-flex flex-column align-items-stretch" method="GET" target="_blank" action="https://igrejas.adventistas.org/<?php echo e(LANG); ?>/Mapa">
          <div class="mb-3">
            <label for="find-church-input" class="form-label"><?php echo e(__('Church search', 'iasd')); ?></label>
          
            <input id="find-church-input" name="q" type="search" class="form-control" placeholder="<?php echo e(__('Search by Postcode, city, neighborhood.', 'iasd')); ?>" required />
          </div>

          <button type="submit" class="btn btn-primary align-self-xl-start "><?php echo e(__('Search', 'iasd')); ?></button>
        </form>
      </div>

      <?php if (! empty($quick_access)) : ?>
        <div class="col d-flex flex-column justify-content-center offset-md-2 pt-5 pt-xl-0">
          <?php $__currentLoopData = $quick_access; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (! empty($item['link'])) : ?>
              <a href="<?php echo e($item['link']['url']); ?>" target="<?php echo e(!empty($item['link']['target']) ? $item['link']['target'] : '_self'); ?>" class="d-flex pt-3">
            <?php endif; ?>

              <?php if (! empty($item['icon'])) : ?>
                <div>
                  <span class="fa-stack fa-2x">
                    <i class="icon fas fa-circle fa-stack-2x"></i>
                    <i class="icon fa-stack-1x fa-inverse <?php echo e($item['icon']); ?>"></i>
                  </span>
                </div>	
              <?php endif; ?>

              <div class="ms-4">
                <?php if (! empty($item['title'])) : ?>
                  <h2><?php echo e($item['title']); ?></h2>
                <?php endif; ?>

                <?php if (! empty($item['description'])) : ?>
                  <p><?php echo e($item['description']); ?></p>
                <?php endif; ?>
              </div>

            <?php if (! empty($item['link'])) : ?>
              </a>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      <?php endif; ?>
    </div>
	</div>
<?php endif; ?>
<?php /**PATH /var/www/html/es/wp-content/themes/pa-theme-sedes/Blocks/PAFindChurch/views/frontend.blade.php ENDPATH**/ ?>