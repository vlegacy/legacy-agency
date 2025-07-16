<?php

/**
 * Template part for displaying posts
 *
 * @package legacytheme
 */

?>
<?php if (is_singular()): ?>
	<div class="card-article content-card">
		<div class="card-service-bg"></div>
		<div class="left-side">
			<div class="content-holder">
				<?php the_content(); ?>
			</div>
		</div>
		<div class="right-side">
			<div class="inner-holder">
				<div class="link-animation-holder opacity-0">
					<a class="link-back" href="/category/articles">
						<div class="icon-holder">
							<img src="/wp-content/themes/legacytheme/assets/images/icon-03.svg" alt="...">
						</div>
						<span>Back</span>
					</a>
				</div>
				<div class="inner-right">
					<?php
					if (is_singular()):
						$thumbnail_url = get_the_post_thumbnail_url(null, 'large');
						echo '<div class="img-holder opacity-0"><img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '"></div>';
					endif; ?>
					<?php $article_first_part_title = get_field('article_first_part_title');
					$main_title = get_the_title();
					$title_markup = '<h1 class="card-title"><span class="text-gradient">' . esc_html($article_first_part_title) . '</span> ' . esc_html($main_title) . '</h1>';
					echo $title_markup; ?>
					<div class="meta-info">
						<div class="info-user">
							<div class="avatar-holder">
								<?php
								$author_avatar = get_avatar_url(get_the_author_meta('user_email'));
								echo '<img src="' . esc_url($author_avatar) . '" alt="' . esc_attr($author_name) . '">';
								?>
							</div>
							<div class="user-content">
								<?php
								$author_id = get_the_author_meta('ID');
								$author_first_name = get_the_author_meta('first_name', $author_id);
								$author_last_name = get_the_author_meta('last_name', $author_id);
								$author_posts_url = get_author_posts_url($author_id);
								?>
								<a href="<?= esc_url($author_posts_url); ?>" class="user-name">
									<?= $author_first_name ?> <span class="user-surname">
										<?= $author_last_name ?>
									</span>
								</a>
								<span class="user-adddate">
									<?php
									$post_date = get_the_date('j F Y');
									echo $post_date_formatted = date_i18n('j F Y', strtotime($post_date));
									?>
								</span>
							</div>
						</div>
						<?php
						$categories = get_the_category();

						if (!empty($categories)) {
							$category = $categories[1];
							$category_name = $category->name;
							$category_link = get_category_link($category->term_id);

							echo '<a class="category-link" href="' . esc_url($category_link) . '">' . esc_html($category_name) . '</a>';
						}
						?>
						<div class="like-block">
							<?php echo do_shortcode('[irecommendthis]'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="card-article card-item card-animated">
		<div class="card-service-bg"></div>
		<div class="left-side">
			<?php
			if (is_singular()):
				$article_first_part_title = get_field('article_first_part_title');
				$main_title = get_the_title();
				$title_markup = '<h1 class="card-title"><span class="text-gradient">' . esc_html($article_first_part_title) . '</span> ' . esc_html($main_title) . '</h1>';
				echo $title_markup;
			else:
				$article_first_part_title = get_field('article_first_part_title');
				$permalink = esc_url(get_permalink());
				$main_title = get_the_title();
				$title_markup = '<h3 class="card-title"><a href="' . $permalink . '" rel="bookmark"><span class="text-gradient">' . esc_html($article_first_part_title) . '</span> ' . esc_html($main_title) . '</a></h3>';
				echo $title_markup;
			endif;
			?>
			<div class="meta-info">
				<div class="info-user">
					<div class="avatar-holder">
						<?php
						$author_avatar = get_avatar_url(get_the_author_meta('user_email'));
						echo '<img src="' . esc_url($author_avatar) . '" alt="' . esc_attr($author_name) . '">';
						?>
					</div>
					<div class="user-content">
						<?php
						$author_id = get_the_author_meta('ID');
						$author_first_name = get_the_author_meta('first_name', $author_id);
						$author_last_name = get_the_author_meta('last_name', $author_id);
						$author_posts_url = get_author_posts_url($author_id);
						?>
						<a href="<?= esc_url($author_posts_url); ?>" class="user-name">
							<?= $author_first_name ?> <span class="user-surname">
								<?= $author_last_name ?>
							</span>
						</a>
						<span class="user-adddate">
							<?php
							$post_date = get_the_date('j F Y');
							echo $post_date_formatted = date_i18n('j F Y', strtotime($post_date));
							?>
						</span>
					</div>
				</div>
				<?php
				$categories = get_the_category();

				if (!empty($categories)) {
					$category = $categories[1];
					$category_name = $category->name;
					$category_link = get_category_link($category->term_id);

					echo '<a class="category-link" href="' . esc_url($category_link) . '">' . esc_html($category_name) . '</a>';
				}
				?>
				<div class="like-block">
					<?php echo do_shortcode('[irecommendthis]'); ?>
				</div>
			</div>
		</div>
		<div class="right-side">
			<?php
			$article_first_part_title = get_field('article_first_part_title');
			$main_title = get_the_title();
			$title_markup = '<span class="card-title"><span class="text-gradient">' . esc_html($article_first_part_title) . '</span> ' . esc_html($main_title) . '</span>';
			echo $title_markup;
			?>
			<?php
			if (is_singular()):
				$thumbnail_url = get_the_post_thumbnail_url(null, 'large');
				echo '<div class="img-holder"><img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '"></div>';
			else:
				$permalink = esc_url(get_permalink());
				$thumbnail_url = get_the_post_thumbnail_url(null, 'large');
				echo '<a class="img-holder" href="' . $permalink . '"><img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '"></a>';
			endif;
			?>
		</div>
	</div>
<?php endif; ?>
<!-- #post-<?php the_ID(); ?> -->