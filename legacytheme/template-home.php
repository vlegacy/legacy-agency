<?php

/**
 *  Template name: Homepage
 */
get_header();

$properties = function_exists('get_fields') ? get_fields() : [];
?>
<div class="page-home">
	<div class="section-intro">
		<div class="container container-md">
			<div class="content-holder">
				<div class="heading-label">
					<div class="heading-label_in">designing senses, not just an images</div>
				</div>
				<?php if (!empty($properties['home_section_1'])): ?>
					<h1 class="heading-size-1 text-gradient">
						<?= $properties['home_section_1']['title'] ?>
					</h1>
				<?php endif; ?>
				<?php if (!empty($properties['home_section_1'])): ?>
					<div class="text-holder">
						<?= $properties['home_section_1']['text'] ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php if (!empty($properties['home_video'])): ?>
		<div class="section-video">
			<div class="container">
				<div class="video-holder" custom-cursor="cursor-play" modal-target>
					<video loop="loop" autoplay="autoplay" preload="auto" muted="muted" playsinline="" poster="" src="<?= $properties['home_video']['url'] ?>"></video>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<?php if (!empty($properties['home_section_text'])): ?>
		<div class="section-text section-text--decor">
			<div class="decor-glif">
				<img class="decor-glif-img" src="<?php echo get_template_directory_uri() . '/assets/images/decor-glif-1.svg'; ?>" alt="">
			</div>
			<div class="container container-md">
				<div class="text-holder text-before">
					<p>
						<?= $properties['home_section_text']['title'] ?>
					</p>
				</div>
				<div class="text-holder text-main has-mask-fill">
					<span>
						<?= $properties['home_section_text']['text'] ?>
					</span>
				</div>
			</div>
		</div>
	<?php endif; ?>
	<div class="section-services">
		<div class="container container-md">
			<?php
			$categories = get_field('categories');

			if ($categories) {
				foreach ($categories as $category) {
					if (!empty($category['block_title'])) {
			?>
						<div class="card-service has-animation" card-service>
							<div class="card-service-bg"></div>
							<div class="left-side">
								<h3 class="card-title"><a href="<?php echo esc_url($category['block_link']); ?>">
										<?php echo esc_html($category['block_title']); ?>
									</a></h3>
								<div class="text-holder">
									<p>
										<?php echo esc_html($category['block_description']); ?>
									</p>
								</div>
								<a href="<?php echo esc_url($category['block_link']); ?>" class="icon-holder">
									<img src="<?php echo get_template_directory_uri() . '/assets/images/icon-01.svg'; ?>">
								</a>
							</div>
							<div class="right-side">
								<div class="img-holder">
									<a href="<?php echo esc_url($category['block_link']); ?>"><img src="<?php echo esc_url($category['block_img']['url']); ?>" alt="<?php echo esc_attr($category['block_img']['alt']); ?>"></a>
								</div>
							</div>
						</div>
			<?php
					}
				}
			}
			?>
		</div>
	</div>
	<div class="section-brands">
		<div class="container">
			<div class="row">
				<?php
				$brands = get_field('home_section_brands');


				if ($brands) {
					foreach ($brands as $brand) {
						if (!empty($brand['link'])) {
							$post_id = $brand['link'];
							$post_link = get_permalink($post_id);
				?>
							<div class="col-3">
								<a href="<?= esc_url($post_link) ?>" target="_blank" class="brands-item">
									<div class="logo-holder">
										<img src="<?= esc_url($brand['logo']['url']) ?>" alt="<?php echo esc_attr($brand['logo']['alt']); ?>">
									</div>
								</a>
							</div>
				<?php
						}
					}
				}
				?>
				<div class="col-3">
					<a href="#" class="brands-item text-item">
						<div class="text-holder">
							<p>I want to place <br>my brand here</p>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="section-portfolio_cards">
		<div class="container">
			<div class="row">
				<?php
				$latest_articles = new WP_Query(
					array(
						'post_type' => 'portfolio',
						'posts_per_page' => 6,
						'orderby' => 'date',
						'order' => 'DESC',
						'post_status' => 'publish',
					)
				);

				if ($latest_articles->have_posts()):
					while ($latest_articles->have_posts()):
						$latest_articles->the_post();
						get_template_part('template-parts/portfolio-item_home');
					endwhile;
					wp_reset_postdata();
				else:
					echo '<p>No articles found</p>';
				endif;
				?>
			</div>
		</div>
	</div>
	<div class="section-articles">
		<div class="container">
			<?php if (!empty($properties['section_articles_title'])): ?>
				<h2 class="section-title text-gradient">
					<?= $properties['section_articles_title'] ?>
				</h2>
			<?php endif; ?>

			<!-- <div class="cards-holder">
				<?php
				$latest_articles = new WP_Query(
					array(
						'post_type' => 'articles',
						'posts_per_page' => 3,
						'orderby' => 'date',
						'order' => 'DESC',
						'post_status' => 'publish',
					)
				);
				// var_dump($latest_articles);
				if ($latest_articles->have_posts()):
					while ($latest_articles->have_posts()):
						$latest_articles->the_post();
						// get_template_part('template-parts/article-item');
				?>
						<div class="card-article card-item card-animated">
							<div class="card-service-bg"></div>
							<div class="left-side">
								<?php
								$article_first_part_title = get_field('article_first_part_title');
								$permalink = esc_url(get_permalink());
								$main_title = get_the_title();
								$title_markup = '<h3 class="card-title"><a href="' . $permalink . '" rel="bookmark"><span class="text-gradient">' . esc_html($article_first_part_title) . '</span> ' . esc_html($main_title) . '</a></h3>';
								echo $title_markup;
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
								$permalink = esc_url(get_permalink());
								$main_title = get_the_title();
								$title_markup = '<h3 class="card-title"><a href="' . $permalink . '" rel="bookmark"><span class="text-gradient">' . esc_html($article_first_part_title) . '</span> ' . esc_html($main_title) . '</a></h3>';
								echo $title_markup;
								?>
								<?php
								$permalink = esc_url(get_permalink());
								$thumbnail_url = get_the_post_thumbnail_url(null, 'large');
								echo '<a class="img-holder" href="' . $permalink . '"><img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '"></a>';
								?>
							</div>
						</div>
				<?php
					endwhile;
					wp_reset_postdata();
				else:
					echo '<p>No articles found</p>';
				endif;
				?>
			</div> -->

			<div class="cards-holder">
				<?php
				$latest_articles = new WP_Query(
					array(
						'post_type' => 'articles',
						'posts_per_page' => 3,
						'orderby' => 'date',
						'order' => 'DESC',
						'post_status' => 'publish',
					)
				);

				if ($latest_articles->have_posts()):
					while ($latest_articles->have_posts()):
						$latest_articles->the_post();
				?>
						<div class="card-article card-item card-animated">
							<div class="card-service-bg"></div>
							<div class="left-side">
								<?php
								$article_first_part_title = function_exists('get_field') ? get_field('article_first_part_title') : '';
								$permalink = esc_url(get_permalink());
								$main_title = get_the_title();
								$title_markup = '<h3 class="card-title"><a href="' . $permalink . '" rel="bookmark"><span class="text-gradient">' . esc_html($article_first_part_title) . '</span> ' . esc_html($main_title) . '</a></h3>';
								echo $title_markup;
								?>
								<div class="meta-info">
									<div class="info-user">
										<div class="avatar-holder">
											<?php
											$author_avatar = get_avatar_url(get_the_author_meta('user_email'));
											$author_name = get_the_author_meta('display_name');
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
											<a href="<?php echo esc_url($author_posts_url); ?>" class="user-name">
												<?php echo $author_first_name; ?> <span class="user-surname"><?php echo $author_last_name; ?></span>
											</a>
											<span class="user-adddate">
												<?php echo date_i18n('j F Y', strtotime(get_the_date('j F Y'))); ?>
											</span>
										</div>
									</div>
									<?php
									$categories = get_the_category();
									if (!empty($categories)) {
										$category = $categories[0]; // Используем первую категорию
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
								$thumbnail_url = get_the_post_thumbnail_url(null, 'large');
								if ($thumbnail_url) {
									echo '<a class="img-holder" href="' . $permalink . '"><img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '"></a>';
								} else {
									echo '<a class="img-holder" href="' . $permalink . '"><img src="' . esc_url(get_template_directory_uri() . '/path/to/default-image.jpg') . '" alt="' . esc_attr(get_the_title()) . '"></a>';
								}
								?>
							</div>
						</div>
				<?php
					endwhile;
					wp_reset_postdata();
				else:
					echo '<p>No articles found</p>';
				endif;
				?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
