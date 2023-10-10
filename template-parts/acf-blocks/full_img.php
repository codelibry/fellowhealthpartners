<?php
$image = get_sub_field('image');
$size = 'full_img';
?>
<?php if ($image) : ?>
    <div class="full_img">
        <?php echo wp_get_attachment_image($image, $size); ?>
    </div>
<?php endif; ?>