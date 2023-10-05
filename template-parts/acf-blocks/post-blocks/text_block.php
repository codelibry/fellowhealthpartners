<?php
$text_content = get_sub_field('text_content'); ?>

<?php if ($text_content) : ?>
    <div class="content-block text-color-gray mb-2 mb-sm-4">
        <?php echo $text_content; ?>
    </div>
<?php endif; ?>