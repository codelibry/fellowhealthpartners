<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package fellow
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="entry-content">
			<section class="error-404 not-found vc_row wpb_row section-paddings text-center">
				<header class="page-header mt-4">
					<div class="heading-404 text--size--190 text-color-primary text--center font--weight--900">404</div>
					<div class="fellow-heading">
						<h1 class="title font--weight--700">Page not found</h1>
					</div>
				</header><!-- .page-header -->

				<div class="page-content mb-4">
					<p><?php esc_html_e("Somethings gone missing. The page you’re looking for has either been deleted, or never existed.", 'fellow'); ?></p>
					<div class="error-404-buttons">
						<a href="/" class="button button--sm bg--gradient-orange text-color-white">Return Home</a>
						<a href="/contact" class="button button--sm bg--gradient-orange text-color-white">Contact</a>
					</div>
				</div><!-- .page-content -->

				<style>
					.heading-404 {
						/* text-align: center; */
						/* font-size: 190px; */
						/* font-weight: 900; */
						/* color: #F7961F; */
						line-height: 1;
						margin-bottom: 10px;
					}

					.page-header .title {
						text-transform: uppercase;
						line-height: 1;
					}

					.error-404 {
						max-width: 550px;
						margin-left: auto;
						margin-right: auto;
					}

					.error-404-buttons {
						margin-top: 60px !important;
					}

					.error-404-buttons .button {
						margin-left: 20px;
						margin-right: 20px;
						margin-bottom: 10px;
						min-width: 200px;
					}
				</style>
			</section><!-- .error-404 -->
		</div>
	</div>
</main><!-- #main -->
<?php
get_footer();
