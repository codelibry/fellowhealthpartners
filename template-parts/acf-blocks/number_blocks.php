<?php
$title = get_sub_field('title');
$numbers = get_sub_field('number_blocks');
?>

<div class="number_blocks mb-75 max-width">
    <div class="container">
        <?php if ($title) : ?>
            <div class="number_blocks__top mb-80">
                <div class="row">
                    <div class="col-12">
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
                    <div class="vertical_block <?php if ($i == 1) : echo 'active';
                                                endif ?>">

                        <div class="vertical_block__header">

                            <div class="title_active bg--gradient-orange content-block">
                                <p class="text-color-white h5 d-flex"><span><?php echo $i ?>.</span> <?php echo $vertical_title; ?></p>
                            </div>

                            <div class="number h3 text-color-primary">
                                <?php echo $i ?>.
                            </div>


                        </div>

                        <div class="vertical_block__content-wrapper">
                            <div class="vertical_block__content content text-color-gray content-block">
                                <?php echo $content; ?>
                            </div>
                        </div>

                        <div class="vertical_block__footer-wrapper">
                            <div class="vertical_block__footer">
                                <div class="title">
                                    <h3 class="text--size--21 font--weight--800"><?php echo $vertical_title; ?></h3>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php $i++;
                endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>