<?php
$title = get_sub_field('title');
$numbers = get_sub_field('number_blocks');
?>

<div class="number_blocks mb-75">
    <div class="container">
        <?php if ($title) : ?>
            <div class="number_blocks__top mb-80">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="title_block">
                            <h2><?php echo $title; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($numbers) : ?>
            <div class="number_blocks__main">
                <?php $i = 1;
                foreach ($numbers as $number) :
                    $vertical_title = $number['subtitle'];
                    $content = $number['content'] ?>
                    <div class="vertical_block d-flex">
                        <div class="number h3 text-color-primary">
                            <?php echo $i ?>.
                        </div>
                        <div class="title">
                            <h3 class="text--size--21 font--weight--800"><?php echo $vertical_title; ?></h3>
                        </div>
                        <div class="title_active bg--gradient-orange content-block">
                            <p class="text-color-white h5 d-flex"><span><?php echo $i ?>.</span> <?php echo $vertical_title; ?></p>
                        </div>
                        <div class="content text-color-gray content-block">
                            <?php echo $content; ?>
                        </div>
                    </div>
                <?php $i++;
                endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>