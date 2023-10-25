<?php
$text_content = get_sub_field('text_content');
$author_name = get_sub_field('author_name');
$author_position = get_sub_field('author_position'); ?>

<?php if ($text_content) : ?>
    <div class="content-block text-color-gray mb-2 mb-sm-4">
        <blockquote xlass="font--italic text--size--32 text-color-black">
            <div class="testimonials__listItem">
                <?php echo $text_content; ?>
            </div>
            <footer class="bg--white">
                <?php if ($author_position) : ?>
                    <cite class="text--size--18 text--uppercase text-color-secondary font--normal"><?php echo $author_position; ?></cite>
                <?php endif; ?>
                <?php if ($author_name) : ?>
                    <span class=""><?php echo $author_name; ?></span>
                <?php endif; ?>
            </footer>
        </blockquote>
    </div>
<?php endif; ?>