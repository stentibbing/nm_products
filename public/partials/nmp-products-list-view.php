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
              $packages .= $package->slug . " ";
          }
          ?>
          data-packages="<?php echo trim($packages); ?>"
      <?php endif; ?>
    ><?php echo esc_html($product['title']); ?>
    <ul class="nm-product-list-package-list">
      <?php if (array_key_exists('packages', $product)): ?>
        <?php foreach ($product['packages'] as $package): ?>
          <li class="nm-product-list-package">
            <?php echo $package->name; ?>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
  </li>
  <?php endforeach; ?>
</ul>

<?php
return ob_get_clean();
