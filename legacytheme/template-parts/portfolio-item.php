<?php

defined('ABSPATH') || exit;

global $post;
?>
<div class="block_next-case">
	<div class="container">
		<span class="block-title">
			Next <br> Case:
		</span>
	</div>
	<div class="relative-holder">
		<div class="container">
			<?php
			$thumbnail_url = get_the_post_thumbnail_url(null, 'large');
			echo '<a href="' . esc_url(get_permalink()) . '" class="img-holder"><img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '"></a>';
			?>
		</div>
		<div class="marquee-holder">
			<div class="case-marquee mouse-hover" style="color: <?php echo get_field('title_color'); ?>;">
				<?php
				$main_title = get_the_title();
				$title_markup = '<a href="' . esc_url(get_permalink()) . '" class="word-holder">' . get_the_title() . '</a>';
				echo $title_markup;
				echo $title_markup;
				echo $title_markup;
				echo $title_markup;
				echo $title_markup;
				?>
			</div>
		</div>
	</div>
</div>