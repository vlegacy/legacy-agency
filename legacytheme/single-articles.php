<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package stalker-by-serhii.D
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="page-article">
		<div class="section-articles">
			<div class="container">
				<?php
				while (have_posts()):
					the_post();

					get_template_part('template-parts/content', get_post_type());

					if (comments_open() || get_comments_number()):
						comments_template();
					endif;

				endwhile;
				?>
				<div class="cards-holder">
					<?php
					$random_posts = get_posts([
						'numberposts' => 2,
						'orderby' => 'rand',
						'order' => 'DESC',
						'post_type' => 'articles',
						'post_status' => 'publish',
						'suppress_filters' => true,
					], OBJECT);

					if (!empty($random_posts)):
						?>
						<?php foreach ($random_posts as $post): ?>
							<?php
							setup_postdata($post);
							get_template_part('template-parts/article-item'); ?>
						<?php endforeach;
						wp_reset_postdata(); ?>
					<?php endif;
					?>
				</div>
			</div>
		</div>
	</div>
</main><!-- #main -->
<?php

get_footer();