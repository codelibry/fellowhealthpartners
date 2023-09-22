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

<?php get_template_part('template-parts/footer/footer'); ?>

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