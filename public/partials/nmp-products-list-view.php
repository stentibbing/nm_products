<?php

/**
 * NM-Products products list view
 */

ob_start(); ?>

<ul class="nm-products-list">
  <?php foreach ($products as $product): ?>
    <li class="nm-product"
      <?php if (array_key_exists('packages', $product)): ?>
        <?php
          $packages = "";
          foreach ($product['packages'] as $package) {
              $packages .= $package . " ";
          }
          ?>
          data-packages="<?php echo trim($packages); ?>"
      <?php endif; ?>
    ><?php echo esc_html($product['title']); ?></li>
  <?php endforeach; ?>
</ul>

<?php
return ob_get_clean();
