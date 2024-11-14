<?php
/**
 * Template part for displaying posts portfolio
 *
 * @package legacytheme
 */

?>
<?php if (is_singular()): ?>
<?php else: ?>
	<div class="col-6">
		<div class="card-portfolio has-animation opacity-0">
			<?php
			$permalink = esc_url(get_permalink());
			$thumbnail_url = get_the_post_thumbnail_url(null, 'large');
			echo '<div class="img-holder" href="' . $permalink . '"><img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '"></div>';
			?>
			<h3 class="card-title text-gradient">
				<?php
				$main_title = get_the_title();
				echo esc_html($main_title) ?>
			</h3>
			<div class="text-holder">
				<?php
				$short_desc_value = get_field('short_desc', get_the_ID());

				if ($short_desc_value) {
					echo '<p>' . $short_desc_value . '</p>';
				}
				?>
			</div>
			<?php
			$permalink = esc_url(get_permalink());
			$main_title = get_the_title();
			$title_markup = '<a href="' . $permalink . '" class="card-link" rel="bookmark">' . esc_html($main_title) . '</a></h3>';
			echo $title_markup; ?>
		</div>
	</div>
<?php endif; ?>
<!-- #post-<?php the_ID(); ?> -->