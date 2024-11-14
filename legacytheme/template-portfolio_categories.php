<?php
/**
 *  Template name: Portfolio categories
 */
get_header();

$properties = function_exists('get_fields') ? get_fields() : [];


function get_category_title_by_slug($slug)
{
	$category_term = get_term_by('slug', $slug, 'cat_portfolio');

	$title = get_field('title', $category_term);

	if ($category_term) {
		return $title;
	}

	return '';
}

function get_category_image_url_by_slug($slug, $field_name)
{
	$category_term = get_term_by('slug', $slug, 'cat_portfolio');


	if ($category_term) {
		$field_value = get_field($field_name, $category_term);

		return isset($field_value['url']) ? $field_value['url'] : '';
	}

	return '';
}

function get_category_image_alt_by_slug($slug, $field_name)
{
	$category_term = get_term_by('slug', $slug, 'cat_portfolio');

	if ($category_term) {
		$field_value = get_field($field_name, $category_term);

		return isset($field_value['alt']) ? $field_value['alt'] : '';
	}

	return '';
}

function get_category_link_by_slug($slug)
{
	$category_term = get_term_by('slug', $slug, 'cat_portfolio');

	if ($category_term) {
		return get_term_link($category_term);
	}

	return '';
}

function get_category_name_by_slug($slug)
{
	$category_term = get_term_by('slug', $slug, 'cat_portfolio');

	if ($category_term) {
		return $category_term->name;
	}

	return '';
}



?>
<div class="page-portfolio-categories">
	<div class="categories-intro">
		<div class="container">
			<div class="row">
				<?php if (!empty($properties['text'])): ?>
					<div class="col-7">
						<div class="text-holder text-main has-mask has-mask-fill-2">
							<span>
								<?= $properties['text'] ?>
							</span>
						</div>
					</div>
				<?php endif; ?>
				<?php if (!empty($properties['img'])): ?>
					<div class="col-5">
						<div class="img-holder">
							<img src="<?php echo esc_url($properties['img']['url']); ?>" alt="<?php echo esc_attr($properties['img']['alt']); ?>">
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="categories-cards">
			<div class="row">
				<div class="col-6">
					<div class="category-card padding-md">
						<div class="title-holder positioning-1">
							<h3 class="card-title text-gradient">
								<?php echo get_category_title_by_slug('ux-ui-web-design') ?>
							</h3>
							<div class="arrow-holder">
								<img src="/wp-content/themes/legacytheme/assets/images/icon-02.svg" alt="icon arrow">
							</div>
						</div>
						<div class="bg-img">
							<picture>
								<source srcset="<?php echo get_category_image_url_by_slug('ux-ui-web-design', 'picture_mobile') ?>" media="(max-width: 575px)">
								<img src="<?php echo get_category_image_url_by_slug('ux-ui-web-design', 'picture_desktop') ?>" alt="<?php echo get_category_image_alt_by_slug('ux-ui-web-design', 'picture_mobile') ?>">
							</picture>
						</div>
						<a class="link-to-post" href="<?php echo get_category_link_by_slug('ux-ui-web-design') ?>">
							<?php echo get_category_name_by_slug('brand-identity') ?>
						</a>
					</div>
				</div>
				<div class="col-6">
					<div class="two-in-col">
						<div class="category-card padding-md">
							<div class="title-holder positioning-1">
								<h3 class="card-title text-gradient">
									<?php echo get_category_title_by_slug('brand-identity') ?>
								</h3>
								<div class="arrow-holder">
									<img src="/wp-content/themes/legacytheme/assets/images/icon-02.svg" alt="icon arrow">
								</div>
							</div>
							<div class="bg-img">
								<picture>
									<source srcset="<?php echo get_category_image_url_by_slug('brand-identity', 'picture_mobile') ?>" media="(max-width: 575px)">
									<img src="<?php echo get_category_image_url_by_slug('brand-identity', 'picture_desktop') ?>" alt="<?php echo get_category_image_alt_by_slug('brand-identity', 'picture_mobile') ?>">
								</picture>
							</div>
							<a class="link-to-post" href="<?php echo get_category_link_by_slug('brand-identity') ?>">
								<?php echo get_category_name_by_slug('brand-identity') ?>
							</a>
						</div>
						<div class="category-card padding-md content-bottom">
							<div class="title-holder positioning-2">
								<h3 class="card-title text-gradient">
									<?php echo get_category_title_by_slug('pitch-decks-presentations') ?>
								</h3>
								<div class="arrow-holder">
									<img src="/wp-content/themes/legacytheme/assets/images/icon-02.svg" alt="icon arrow">
								</div>
							</div>
							<div class="bg-img">
								<picture>
									<source srcset="<?php echo get_category_image_url_by_slug('pitch-decks-presentations', 'picture_mobile') ?>" media="(max-width: 575px)">
									<img src="<?php echo get_category_image_url_by_slug('pitch-decks-presentations', 'picture_desktop') ?>" alt="<?php echo get_category_image_alt_by_slug('pitch-decks-presentations', 'picture_mobile') ?>">
								</picture>
							</div>
							<a class="link-to-post" href="<?php echo get_category_link_by_slug('pitch-decks-presentations') ?>">
								<?php echo get_category_name_by_slug('pitch-decks-presentations') ?>
							</a>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="category-card padding-md margin-bottom-0">
						<div class="title-holder positioning-1 hide-arrow-desktop">
							<h3 class="card-title text-gradient text-center">
								<?php echo get_category_title_by_slug('mobile-applications') ?>
							</h3>
							<div class="arrow-holder">
								<img src="/wp-content/themes/legacytheme/assets/images/icon-02.svg" alt="icon arrow">
							</div>
						</div>
						<div class="bg-img">
							<picture>
								<source srcset="<?php echo get_category_image_url_by_slug('mobile-applications', 'picture_mobile') ?>" media="(max-width: 575px)">
								<img src="<?php echo get_category_image_url_by_slug('mobile-applications', 'picture_desktop') ?>" alt="<?php echo get_category_image_alt_by_slug('mobile-applications', 'picture_mobile') ?>">
							</picture>
						</div>
						<a class="link-to-post" href="<?php echo get_category_link_by_slug('mobile-applications') ?>">
							<?php echo get_category_name_by_slug('mobile-applications') ?>
						</a>
					</div>
				</div>
				<div class="col-4">
					<div class="two-in-col">
						<div class="category-card padding-md content-bottom">
							<div class="title-holder positioning-1">
								<h3 class="card-title text-gradient">
									<?php echo get_category_title_by_slug('seo-optimization') ?>
								</h3>
								<div class="arrow-holder">
									<img src="/wp-content/themes/legacytheme/assets/images/icon-02.svg" alt="icon arrow">
								</div>
							</div>
							<div class="bg-img">
								<picture>
									<source srcset="<?php echo get_category_image_url_by_slug('seo-optimization', 'picture_mobile') ?>" media="(max-width: 575px)">
									<img src="<?php echo get_category_image_url_by_slug('seo-optimization', 'picture_desktop') ?>" alt="<?php echo get_category_image_alt_by_slug('seo-optimization', 'picture_mobile') ?>">
								</picture>
							</div>
							<a class="link-to-post" href="<?php echo get_category_link_by_slug('seo-optimization') ?>">
								<?php echo get_category_name_by_slug('seo-optimization') ?>
							</a>
						</div>
						<div class="category-card padding-md content-bottom margin-bottom-0">
							<div class="title-holder positioning-1">
								<h3 class="card-title text-gradient">
									<?php echo get_category_title_by_slug('search-engine-marketing') ?>
								</h3>
								<div class="arrow-holder">
									<img src="/wp-content/themes/legacytheme/assets/images/icon-02.svg" alt="icon arrow">
								</div>
							</div>
							<div class="bg-img">
								<picture>
									<source srcset="<?php echo get_category_image_url_by_slug('search-engine-marketing', 'picture_mobile') ?>" media="(max-width: 575px)">
									<img src="<?php echo get_category_image_url_by_slug('search-engine-marketing', 'picture_desktop') ?>" alt="<?php echo get_category_image_alt_by_slug('search-engine-marketing', 'picture_mobile') ?>">
								</picture>
							</div>
							<a class="link-to-post" href="<?php echo get_category_link_by_slug('search-engine-marketing') ?>">
								<?php echo get_category_name_by_slug('search-engine-marketing') ?>
							</a>
						</div>
					</div>
				</div>
				<div class="col-4">
					<div class="category-card padding-md h-100 margin-bottom-0">
						<div class="title-holder positioning-1 hide-arrow-desktop">
							<h3 class="card-title text-gradient text-center">
								<?php echo get_category_title_by_slug('3d-graphics-motion-design') ?>
							</h3>
							<div class="arrow-holder">
								<img src="/wp-content/themes/legacytheme/assets/images/icon-02.svg" alt="icon arrow">
							</div>
						</div>
						<div class="bg-img">
							<picture>
								<source srcset="<?php echo get_category_image_url_by_slug('3d-graphics-motion-design', 'picture_mobile') ?>" media="(max-width: 575px)">
								<img src="<?php echo get_category_image_url_by_slug('3d-graphics-motion-design', 'picture_desktop') ?>" alt="<?php echo get_category_image_alt_by_slug('3d-graphics-motion-design', 'picture_mobile') ?>">
							</picture>
						</div>
						<a class="link-to-post" href="<?php echo get_category_link_by_slug('3d-graphics-motion-design') ?>">
							<?php echo get_category_name_by_slug('3d-graphics-motion-design') ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
