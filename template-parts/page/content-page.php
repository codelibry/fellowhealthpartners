<?php
$content = get_the_content();
if (!empty($content)) :
?>
    <div class="content-block default_content">
        <?php echo $content; ?>
    </div>
<?php endif; ?>