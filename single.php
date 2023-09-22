<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fellow
 */

get_header();
?>

<main id="primary" class="site-main">
        <div class="container  section-paddings">
		<header class="single-header">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
						
<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to News." href="http://fellow.local/news/" class="post-root post post-post"><span property="name">News</span></a><meta property="position" content="1"></span><span class="empty"></span><span property="itemListElement" typeof="ListItem"><span property="name" class="post post-post current-item">Article</span><meta property="url" content="http://fellow.local/beginning-january-1-2021-coding-for-evaluation-and-management-e-m-is-changing-these-are-some-of-the-biggest-changes-in-the-past-20-years/"><meta property="position" content="3"></span>						</div>

						<a href="/news/" class="back-to-category">Back to News <svg width="16" height="13" viewBox="0 0 16 13" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.08349 9.08398L1.3335 5.33398M1.3335 5.33398L5.08349 1.58398M1.3335 5.33398H11.3335C13.1744 5.33398 14.6668 6.82637 14.6668 8.66731V8.66731C14.6668 10.5083 13.1744 12.0006 11.3335 12.0006H9.66682" stroke="#A1A7B2" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</a>
                  
					</header>

            <div class="d-lg-flex has-sidebar">
                <div class="main-content">
					
					<h1 class="h3 single-post-title"><?php the_title();?></h1>

					<div class="single-post-date"><?php echo get_the_date();?></div>

					<div class="single-post-content">
						<?php
							the_content();
						?>
					</div><!-- .post-content -->
        
                   
                </div>

				<aside id="secondary" class="sidebar">
					<?php dynamic_sidebar( 'sidebar2' ); ?>
				</aside><!-- #secondary -->
            </div>
                
        </div>
	</main><!-- #main -->

<?php
get_footer();
