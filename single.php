<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fellow
 */

get_header();
$content = get_the_content();
?>

<main id="primary" class="site-main">
	<?php get_template_part('template-parts/breadcrumbs/breadcrumbs'); ?>
	<div class="container">
		<div class="single-post_page mt-80 mb-150">
			<div class="row has-sidebar">
				<div class="col-lg-7">
					<a href="<?php echo get_the_permalink(get_option('page_for_posts'));?>" class="back-to-category text-color-orange font--weight--500">
						<?php _e('Back to News', 'fhp'); ?>
						<svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.08349 9.08398L1.3335 5.33398M1.3335 5.33398L5.08349 1.58398M1.3335 5.33398H11.3335C13.1744 5.33398 14.6668 6.82637 14.6668 8.66731V8.66731C14.6668 10.5083 13.1744 12.0006 11.3335 12.0006H9.66682" stroke="#FF851F" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</a>
					<div class="main-content mt-80">
						<h1 class="h3 single-post-title mb-40"><?php the_title(); ?></h1>
						<div class="single-post-date mb-2 mb-sm-4 text--size--17 text-color-gray"><?php echo get_the_date(); ?></div>
						<div class="single-post-content">
							<?php
							if (has_post_thumbnail() && empty($content)) : ?>
								<div class="single-post-image mb-2 mb-sm-4">
									<?php echo the_post_thumbnail('full'); ?>
								</div>
							<?php endif; ?>

							<?php
							if (!post_password_required()) :
								// Your custom code should here
								get_template_part('template-parts/page/content', 'page');
								the_acf_loop_post();
							else :
								// we will show password form here
								echo get_the_password_form();
							endif;
							?>

							<!-- <a href="javascript:void(0);" class="mt-3 d-block back-to-category text-color-orange font--weight--500">
								<?php _e('Back to News', 'fhp'); ?>
								<svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M5.08349 9.08398L1.3335 5.33398M1.3335 5.33398L5.08349 1.58398M1.3335 5.33398H11.3335C13.1744 5.33398 14.6668 6.82637 14.6668 8.66731V8.66731C14.6668 10.5083 13.1744 12.0006 11.3335 12.0006H9.66682" stroke="#FF851F" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
								</svg>
							</a> -->

							<button onclick="history.back()" class="mt-3 button button--back"><?php _e('Back to Articles', 'fellowhealthpartners');?></button>

						</div><!-- .post-content -->
					</div>
				</div>
				<div class="col-lg-5">
					<aside id="secondary" class="sidebar">
						<?php dynamic_sidebar('sidebar2'); ?>
					</aside><!-- #secondary -->
				</div>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
