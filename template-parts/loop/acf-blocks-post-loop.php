<?php
if (have_rows('post_blocks')) :
    while (have_rows('post_blocks')) : the_row();
        get_template_part('template-parts/acf-blocks/post-blocks/' . get_row_layout());
    endwhile;
endif;
