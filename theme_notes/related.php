<div class="related-article-links">
<?php
	 $orig_post = $post;
	 global $post;
	 $tags = wp_get_post_tags($post->ID);

    if ($tags) {
        $tagsIds = [];
        
        foreach($tags as $tag) {
            $tagsIds[] = $tag->term_id;
            $args = array(
                'tag__in' => $tagsIds,
                'post__not_in' => array($post->ID),
                'posts_per_page' => 4, // 表示する関連記事の数
                'ignore_sticky_posts' => false, // 先頭固定表示投稿を無視しない
                'orderby' => 'rand', // ランダム表示
            );
        }

        $my_query = new wp_query($args);
?>
    <h4>Related Article</h4>
    <div class="related-articles">
    <?php
		while( $my_query->have_posts() ) {
			$my_query->the_post();

			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
			if ( !empty($thumb['0']) ) {
				$thumbnailUrl = $thumb['0'];
			} else {
				$thumbnailUrl = get_template_directory_uri() . "/images/no-image.png";
        }
    ?>
        <div class="related-article">
            <div class="article-link thumbnail" style=background-image:url(<?=$thumbnailUrl?>);>
                <a href="<?php the_permalink(); ?>" itemprop="url"></a>
            </div>
            <h5 class="article-title">
                <a href="<?php the_permalink(); ?>" itemprop="url" title="<?php the_title(); ?>">
                <?php if (strlen($post->post_title) > 30) {
					echo mb_substr(the_title($before = '', $after = '', FALSE), 0, 60,  'UTF-8') . '...'; } else {
					the_title();
                } ?>
                </a>
            </h5>
            <p class="related-category">
                <?php $cat = get_the_category(); $cat = $cat[0]; ?>
                <a href="<?php echo get_bloginfo('url') . '/category/' . $cat->category_nicename ?>">
						<?php echo $cat->cat_name; ?>
					</a>
            </p>
        </div>
    <?php } // while文ここまで
    ?>
    </div>
<?php
} // IF文ここまで
$post = $orig_post;
wp_reset_query(); ?>
</div>