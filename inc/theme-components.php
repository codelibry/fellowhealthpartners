<?php

/**
 * Remove Contact Form 7 auto added p tags
 */
add_filter('wpcf7_autop_or_not', '__return_false');
