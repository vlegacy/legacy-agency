<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>
<main id="main">
	<div class="page-portfolio">
		<div class="page-intro">
			<div class="container">
				<div class="logo-holder">
					<a class="link-back" href="/portfolio">
						<div class="icon-holder">
							<img src="/wp-content/themes/legacytheme/assets/images/icon-03.svg" alt="...">
						</div>
						<span>Back to Services</span>
					</a>
					<h1 class="h1">
						<?php
						single_term_title();
						?>
					</h1>
				</div>
				<div class="text-holder has-mask has-mask-fill-2">
					<span>
						<?php
						$desc = get_the_archive_description();
						$description = \esc_html(\strip_tags($desc));
						echo $description;
						?>
					</span>
				</div>
			</div>
		</div>
		<div class="section-portfolio_cards">
			<div class="container">
				<div class="row">
					<?php if (have_posts()): ?>
						<!-- <header class="page-header pt-1 pb-1 visually-hidden-focusable">
							<?php
							the_archive_title('<h1 class="page-title fs-5 mb-0">', '</h1>');
							the_archive_description('<div class="archive-description">', '</div>');
							?>
						</header> -->
						<?php
						/* Start the Loop */
						while (have_posts()):
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */

							get_template_part('template-parts/content-portfolio', get_post_type());


						endwhile;

						the_posts_navigation();

					else:

						get_template_part('template-parts/content', 'none');

					endif;
					?>
				</div>
			</div>
		</div>
	</div>
</main><!-- #main -->
<?php


get_footer();