<?php

/**
 * NM-Products packages list view
 */
ob_start(); ?>

<ul class="nm-packages-list">

  <?php foreach ($packages as $package): ?>
    <li class="nm-package" data-package="<?php echo esc_html($package['slug']); ?>">
      <span class="nm-package-title"><?php echo esc_html($package['name']); ?></span>
      <span class="nm-package-title-hidden"><?php echo esc_html($package['name']); ?></span>
    </li>
  <?php endforeach; ?>

</ul>

<?php
return ob_get_clean();
