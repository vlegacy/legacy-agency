<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="page-articles">
		<div class="container">
			<?php if (have_posts()): ?>
				<?php while (have_posts()):
					the_post(); ?>
					<?php get_template_part('template-parts/content', get_post_type()); ?>
				<?php endwhile; ?>
				<?php wp_pagenavi(); ?>
			<?php else: ?>
				<?php get_template_part('template-parts/content', 'none'); ?>
			<?php endif; ?>
		</div>
	</div>
</main><!-- #main -->
<?php


get_footer();