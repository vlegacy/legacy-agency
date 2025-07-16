<?php

get_header();
?>
<main id="main">
	<div class="page-articles">
		<div class="container">
			<a class="link-back only-tablet" href="/">
				<div class="icon-holder">
					<img src="/wp-content/themes/legacytheme/assets/images/icon-03.svg" alt="...">
				</div>
				<span>Back</span>
			</a>
			<h1 class="page-title text-gradient opacity-0">
				Delicious dish for mind. <br>
				Bon appetite!
			</h1>
		</div>
		<div class="section-articles">

			<div class="container">
				<div class="cards-holder">
					<?php if (have_posts()): ?>

						<!-- <?php
									the_archive_title('<h1 class="page-title fs-5 mb-0">', '</h1>');
									the_archive_description('<div class="archive-description">', '</div>');
									?> -->

					<?php
						/* Start the Loop */
						while (have_posts()):
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */

							get_template_part('template-parts/content', get_post_type());


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
