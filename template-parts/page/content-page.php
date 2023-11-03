<?php
$content = get_the_content();
if (!empty($content)) :
?>
    <div class="content-block text-color-gray default_content">
        <?php the_content(); ?>
    </div>
<?php endif; ?>