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
						'post__not_in'  => array(get_the_ID()),
					]);

					if (!empty($random_posts)):
						foreach ($random_posts as $post):
							setup_postdata($post);
					?>
							<div class="card-article card-item card-animated">
								<div class="card-service-bg"></div>
								<div class="left-side">
									<?php
									$article_first_part_title = function_exists('get_field') ? get_field('article_first_part_title') : '';
									$permalink = esc_url(get_permalink());
									$main_title = get_the_title();
									?>
									<h3 class="card-title">
										<a href="<?php echo $permalink; ?>" rel="bookmark">
											<span class="text-gradient"><?php echo esc_html($article_first_part_title); ?></span>
											<?php echo esc_html($main_title); ?>
										</a>
									</h3>
									<div class="meta-info">
										<div class="info-user">
											<div class="avatar-holder">
												<?php
												$author_avatar = get_avatar_url(get_the_author_meta('user_email'));
												$author_name = get_the_author_meta('display_name');
												?>
												<img src="<?php echo esc_url($author_avatar); ?>" alt="<?php echo esc_attr($author_name); ?>">
											</div>
											<div class="user-content">
												<?php
												$author_id = get_the_author_meta('ID');
												?>
												<a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="user-name">
													<?php echo get_the_author_meta('first_name', $author_id); ?>
													<span class="user-surname"><?php echo get_the_author_meta('last_name', $author_id); ?></span>
												</a>
												<span class="user-adddate"><?php echo get_the_date('j F Y'); ?></span>
											</div>
										</div>
										<?php
										$categories = get_the_category();
										if (!empty($categories)) {
											$category = $categories[0];
										?>
											<a class="category-link" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
												<?php echo esc_html($category->name); ?>
											</a>
										<?php } ?>
										<div class="like-block">
											<?php echo do_shortcode('[irecommendthis]'); ?>
										</div>
									</div>
								</div>
								<div class="right-side">
									<?php if (has_post_thumbnail()) { ?>
										<a class="img-holder" href="<?php echo $permalink; ?>">
											<?php the_post_thumbnail('large'); ?>
										</a>
									<?php } else { ?>
										<a class="img-holder" href="<?php echo $permalink; ?>">
											<img src="<?php echo esc_url(get_template_directory_uri() . '/path/to/default-image.jpg'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
										</a>
									<?php } ?>
								</div>
							</div>
					<?php endforeach;
						wp_reset_postdata();
					endif;
					?>
				</div>

			</div>
		</div>
	</div>
</main><!-- #main -->
<?php

get_footer();
