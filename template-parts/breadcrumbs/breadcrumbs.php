<?php

/**
 * Yoast breadcrumbs
 */

?>

<?php if (function_exists('yoast_breadcrumb')) : ?>
    <div class="breadcrumbs__block mt-2">
        <div class="container">
            <?php yoast_breadcrumb('<p id="breadcrumbs" class="text--size--19 font--weight--500">', '</p>'); ?>
        </div>
    </div>
<?php endif; ?>