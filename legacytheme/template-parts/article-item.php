<?php

defined('ABSPATH') || exit;

global $post;
?>
<div class="card-article card-item card-animated">
    <div class="card-service-bg test"></div>
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

            <!-- <?php echo do_shortcode('[custom_recommend_button]'); ?> -->
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