<?php
/**
 * The template for displaying author pages
 *
 */

get_header();
?>
<main id="primary" class="site-main">
	<div class="page-author">
		<div class="page-intro">
			<div class="container">
				<div class="intro-left">
					<a class="link-back" href="#">
						<div class="icon-holder">
							<img src="/wp-content/themes/legacytheme/assets/images/icon-03.svg" alt="...">
						</div>
						<span>Back to Services</span>
					</a>
					<span class="intro-title">Author’s Profile</span>
				</div>
				<div class="intro-right">
					<?php
					$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
					?>
					<div class="author-block">
						<div class="img-holder">
							<?php
							$author_avatar = get_avatar_url(get_the_author_meta('user_email', $curauth->ID));

							echo '<img src="' . esc_url($author_avatar) . '" alt="' . esc_attr($author_name) . '">';
							?>
							<img src="images/img-027.jpg" alt="...">
						</div>
						<div class="block-content">
							<div class="block-header">
								<div>
									<h1 class="block-title">
										<?= $curauth->first_name ?>
										<?= $curauth->last_name ?>
									</h1>
									<span class="block-subtitle">
										<?php echo get_user_meta($curauth->ID, 'role', true); ?>
									</span>
								</div>
								<ul class="social-links">
									<?php
									$linkedin_url = get_user_meta($curauth->ID, 'linkedin', true);

									if (!empty($linkedin_url)) {
										echo '<li><a href="' . $linkedin_url . '" target="_blank">LinkedIn</a></li>';
									}
									?>
									<?php
									$instagram_url = get_user_meta($curauth->ID, 'instagram', true);

									if (!empty($instagram_url)) {
										echo '<li><a href="' . $instagram_url . '" target="_blank">Instagram</a></li>';
									}
									?>
									<?php
									$tiktok_url = get_user_meta($curauth->ID, 'tiktok', true);

									if (!empty($tiktok_url)) {
										echo '<li><a href="' . $tiktok_url . '" target="_blank">TikTok</a></li>';
									}
									?>
								</ul>
							</div>
							<div class="block-description">
								<p>
									<?php echo get_the_author_meta('description', $curauth->ID); ?>
								</p>
							</div>
							<div class="block-footer">
								<?php
								if ($curauth) {

									$user_id = $curauth->ID;
									$user_posts = get_posts(array('author' => $user_id, 'numberposts' => -1));

									if ($user_posts) {
										echo '<p class="footer-title">Love to discuss topics about:</p>';
										echo '<ul class="block-tags">';

										foreach ($user_posts as $post) {
											$post_tags = get_the_tags($post->ID);

											if ($post_tags) {
												foreach ($post_tags as $tag) {
													echo '<li>' . esc_html($tag->name) . '</li>';
												}
											}
										}

										echo '</ul>';
									}
								}
								?>
								<?php
								if ($curauth) {
									$user_id = $curauth->ID;

									$args = array(
										'author' => $user_id,
										'post_type' => 'articles',
										'posts_per_page' => -1,
									);

									$user_posts_query = new WP_Query($args);

									$total_posts = $user_posts_query->found_posts;

									if ($user_posts_query->have_posts()) {
										echo '<p class="footer-title">Love to discuss topics about:</p>';
										echo '<ul class="block-tags">';

										while ($user_posts_query->have_posts()) {
											$user_posts_query->the_post();
											$post_tags = get_the_tags();

											if ($post_tags) {
												foreach ($post_tags as $tag) {
													$tag_link = get_tag_link($tag);
													echo '<li><a href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . '</a></li>';
												}
											}
										}

										echo '</ul>';
										wp_reset_postdata();
									}
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-articles">
			<div class="container">
				<span class="section-title">Published Articles
					<span>
						<?php
						if ($curauth) {
							$user_id = $curauth->ID;
							$total_posts = count_user_posts($user_id, 'articles');

							echo esc_html($total_posts);
						} else {
							echo '0';
						}
						?>
					</span>
				</span>
				<div class="cards-holder">
					<?php
					if ($curauth) {
						$user_id = $curauth->ID;

						$author_posts = get_posts([
							'numberposts' => -1,
							'orderby' => 'date',
							'order' => 'DESC',
							'post_type' => 'articles',
							'author' => $user_id,
							'post_status' => 'publish',
							'suppress_filters' => true,
						]);

						if (!empty($author_posts)) {
							foreach ($author_posts as $post) {
								setup_postdata($post);
								get_template_part('template-parts/article-item');
							}
							wp_reset_postdata();
						} else {
							echo '<p>No articles found for this author</p>';
						}
					}
					?>
				</div>
			</div>
		</div>
	</div>
</main><!-- #main -->
<?php
get_footer();
?>