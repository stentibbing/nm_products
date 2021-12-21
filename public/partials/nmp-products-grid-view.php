<?php

/**
 * NM-Products products grid view
 */
ob_start(); ?>

<div class="nm-products">
    <?php foreach ($products as $product): ?>
    <?php if ($product['status'] == 'publish'): ?>
    <article class="nm-single-product <?php echo $product['slug']; ?>">
        <?php if (array_key_exists('accent_color', $product)): ?>
          <style>
          .nm-products .nm-single-product.<?php echo $product['slug'];?> .nm-product-info .nm-product-title:hover h2 {
              color: <?php echo $product['accent_color'];?>;
          }
          </style>
        <?php endif; ?>
        <div class="nm-product-image"><?php echo $product['thumbnail']; ?></div>
        <div class="nm-product-info">
            <a href="<?php echo $product['permalink']; ?>" class="nm-product-title">
                <h2><?php echo $product['title']; ?></h2>
            </a>
        </div>
    </article>
    <?php endif; ?>
    <?php endforeach; ?>
</div>

<?php
return ob_get_clean();
