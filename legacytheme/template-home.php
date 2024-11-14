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
			<div class="section-text">
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
												<img src="https://dev.thelegacy.com.ua/wp-content/themes/legacytheme/assets/images/icon-01.svg">
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
				<?php if (!empty($properties['home_section_brands'])): ?>
						<?php for ($i = 1; $i <= 11; $i++): ?>
								<div class="col-3">
									<a href="<?= $properties['home_section_brands']['logo_' . $i . '_url'] ?>" target="_blank" class="brands-item">
										<div class="logo-holder">
											<img src="<?= $properties['home_section_brands']['logos_' . $i] ?>" alt="Logo <?= $i ?>">
										</div>
									</a>
								</div>
						<?php endfor; ?>
				<?php endif; ?>
				<div class="col-3">
					<div class="brands-item text-item" style="translate: none; rotate: none; scale: none; opacity: 1; transform: translate(0px, 0px); visibility: inherit;">
						<div class="text-holder">
							<p>I want to place <br>my brand here</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-portfolio_cards">
		<div class="container">
			<div class="row">
				<div class="col-6">
					<div class="card-portfolio has-animation">
						<div class="img-holder">
							<img src="/wp-content/themes/legacytheme/assets/images/img-01.jpg" alt="...">
						</div>
						<h3 class="card-title text-gradient">Hi-Tech Club</h3>
						<div class="text-holder">
							<p>Exclusive hookah manufacturer</p>
						</div>
						<a href="#" class="card-link">Hi-Tech Club</a>
					</div>
				</div>
				<div class="col-6">
					<div class="card-portfolio has-animation">
						<div class="img-holder">
							<img src="/wp-content/themes/legacytheme/assets/images/img-02.jpg" alt="...">
						</div>
						<h3 class="card-title text-gradient">KWPC.</h3>
						<div class="text-holder">
							<p>Crypto live show where the community votes for projects in real time</p>
						</div>
						<a href="#" class="card-link">KWPC.</a>
					</div>
				</div>
				<div class="col-6">
					<div class="card-portfolio has-animation">
						<div class="img-holder">
							<img src="/wp-content/themes/legacytheme/assets/images/img-03.jpg" alt="...">
						</div>
						<h3 class="card-title text-gradient">Qube.</h3>
						<div class="text-holder">
							<p>Transparent and secure crypto space</p>
						</div>
						<a href="#" class="card-link">Qube.</a>
					</div>
				</div>
				<div class="col-6">
					<div class="card-portfolio has-animation">
						<div class="img-holder">
							<img src="/wp-content/themes/legacytheme/assets/images/img-04.jpg" alt="...">
						</div>
						<h3 class="card-title text-gradient">BET999.</h3>
						<div class="text-holder">
							<p>Crypto live show where the community votes for projects in real time</p>
						</div>
						<a href="#" class="card-link">BET999.</a>
					</div>
				</div>
				<div class="col-6">
					<div class="card-portfolio has-animation">
						<div class="img-holder">
							<img src="/wp-content/themes/legacytheme/assets/images/img-05.jpg" alt="...">
						</div>
						<h3 class="card-title text-gradient">Skynet Trading</h3>
						<div class="text-holder">
							<p>DEX, based on Everscale</p>
						</div>
						<a href="#" class="card-link">Skynet Trading</a>
					</div>
				</div>
				<div class="col-6">
					<div class="card-portfolio has-animation">
						<div class="img-holder">
							<img src="/wp-content/themes/legacytheme/assets/images/img-06.jpg" alt="...">
						</div>
						<h3 class="card-title text-gradient">Levens.</h3>
						<div class="text-holder">
							<p>Ukrainian manufacturer of hardwood flooring</p>
						</div>
						<a href="#" class="card-link">Levens.</a>
					</div>
				</div>
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
						get_template_part('template-parts/article-item');
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
