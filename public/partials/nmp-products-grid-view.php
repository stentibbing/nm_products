<?php

/**
 * NM-Products products grid view
 */
ob_start(); ?>

<div class="nm-products">
  <?php foreach ($products as $product): ?>
    <?php if ($product->post_status == 'publish'): ?>
      <article class="nm-single-product">
        <div class="nm-product-image"><?php echo get_the_post_thumbnail($product); ?></div>
        <div class="nm-product-info">
          <a href="<?php echo get_permalink($product); ?>" class="nm-product-title">
            <h2><?php echo esc_html($product->post_title); ?></h2>
          </a>
        </div>
      </article>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<?php
return ob_get_clean();
