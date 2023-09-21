<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fellow
 */

?>
<?php global $fellow_options; ?>

<?php if ($fellow_options['footer-contact-text'] || $fellow_options['phone'] || $fellow_options['footer-contact-button']) : ?>
	<div class="pre-footer">
		<div class="container">
			<div class="inner d-md-flex align-items-center justify-content-between">
				<div class="logo">
					<img src="<?php echo get_template_directory_uri(); ?>/images/logo-white.svg" alt="" class="site-footer__logo">
				</div>
				<?php if ($fellow_options['footer-contact-text']) : ?>
					<p class="pre-footer__title"><?php echo $fellow_options['footer-contact-text']; ?></p>
				<?php endif; ?>

				<div class="site-footer__contacts-call">
					<a href="tel:<?php echo $fellow_options['phone']; ?>" class="button white d-md-none"><?php echo $fellow_options['footer-contact-button']; ?></a>
					<button class="button white d-none d-md-inline-flex"><?php echo $fellow_options['footer-contact-button']; ?></button>
				</div>

				<ul class="socials">
					<li><a href="<?php echo $fellow_options['linkedin']; ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.svg" alt=""></a></li>
					<li><a href="mailto:<?php echo $fellow_options['mail']; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/mail.svg" alt=""></a></li>
				</ul>
			</div>
		</div>
	</div>
<?php endif; ?>

<footer id="colophon" class="site-footer">
	<div class="site-footer__inner">
		<div class="container">
			<div class="site-footer__columns">
				<div class="site-footer__col-left">
					<div class="site-footer__contacts">



						<div class="site-footer__copyright">
							<p><?php echo $fellow_options['footer-copyright']; ?></p>
							<p><a href="/privacy-policy/">Privacy Policy</a></p>
						</div>
					</div><!-- .site-footer__contacts -->

					<nav class="site-footer__nav">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-menu',
								'menu_id'        => 'footer-menu',
							)
						);
						?>
					</nav>
				</div><!-- .site-footer__col-left -->

				<div class="site-footer__col-right">

					<?php if (is_active_sidebar('sidebar-footer')) {
						dynamic_sidebar('sidebar-footer');
					} ?>
				</div><!-- .site-footer__col-right -->

			</div><!-- .site-footer__columns -->

		</div><!-- .container -->

		<?php
		$footer_logos = get_field('footer_logos', 'options');
		if ($footer_logos) : ?>
			<div class='site-footer__bottom'>
				<div class='container'>
					<div class='site-footer__bottom-wrap'>
						<?php foreach ($footer_logos as $logo) : ?>
							<?php
							$image = $logo['img'];
							$link = $logo['link'];
							?>
							<?php if ($link) : ?>
								<a href='<?php echo esc_url($link['url']) ?>' target='_blank'>
									<div>
										<img src='<?php echo esc_url($image['url']) ?>' alt='<?php echo esc_url($image['title']) ?>' />
									</div>
								</a>
							<?php else : ?>
								<div>
									<img src='<?php echo esc_url($image['url']) ?>' alt='<?php echo esc_url($image['title']) ?>' />
								</div>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div><!-- .site-footer__bottom -->
		<?php endif; ?>

	</div><!-- .site-footer__inner -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<svg class="clip-svg visually-hidden">
	<defs>
		<clipPath id="waveTop" clipPathUnits="objectBoundingBox">
			<path style="fill:#F8F8F8;" d="M-0.0203,1.1149l1.0409-0.0032V0.0385c0,0-0.32-0.0588-0.5529-0.0166
	c-0.2328,0.0421-0.488,0.019-0.488,0.019V1.1149z" />
		</clipPath>
		<clipPath id="waveTopMobile" clipPathUnits="objectBoundingBox">
			<path style="fill:#964040;" d="M-0.0097,0.009c0,0-0.0547-0.0047,0.2031-0.0047c0.2359,0,0.2828,0.0078,0.5609,0.0141 C1.0027,0.024,1.0028,0.0137,1.0387,0.0137L1.0155,10.1085h-1.0252V0.009z" />
		</clipPath>
		<clipPath id="waveBottom" clipPathUnits="objectBoundingBox">
			<path style="fill:#964040;" d="M-0.0113,0.9557c0,0,0.1344,0.0344,0.2766,0.0391c0.1422,0.0047,0.2428-0.0133,0.2984-0.0203 c0.1234-0.0156,0.1734-0.0281,0.2688-0.025c0.1033,0.0034,0.1703,0.0172,0.1703,0.0172v-1.4453l-1.0094-0.0016L-0.0113,0.9557z" />
		</clipPath>

		<clipPath id="waveImageBottom" clipPathUnits="objectBoundingBox">
			<path style="fill:#964040;" d="M-0.0006,0.8942c0,0,0.1037,0.0989,0.2537,0.1018c0.2453,0.0047,0.2438-0.0703,0.4313-0.0891 c0.1156-0.0116,0.3135-0.0065,0.3135-0.0065v-1.5364H0L-0.0006,0.8942z" />
		</clipPath>

	</defs>
</svg>
<script>
	jQuery('#slick-clients').slick({
		autoplay: false,
		autoplaySpeed: 0,
		slidesToShow: 5,
		slidesToScroll: 1,
		speed: 8000,
		cssEase: 'linear',
		// appendArrows: '.slider-nav',
		arrows: false,
		autoplay: true,
		autoplaySpeed: 0,
		responsive: [{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2
				}
			}
		]
	});
</script>

<style>
	@media only screen and (min-width: 992px) {
		#custom_html-2 .gallery.gallery-columns-4 .gallery-item {
			width: 20%;
		}
	}

	@media only screen and (min-width: 1200px) {
		body footer.site-footer .site-footer__col-right .footer-logos-1 .textwidget {
			max-width: 40rem;
		}
	}

	@media only screen and (max-width: 992px) {
		footer.site-footer .site-footer__col-right .widget .gallery {
			-webkit-box-pack: center;
			-ms-flex-pack: center;
			justify-content: center;
		}
	}
</style>

</body>

</html>