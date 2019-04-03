<?php get_header(); ?>
<?php $s = $_GET['s']; ?>
<!-- 検索ワードが存在すれば表示 -->
<?php if (!empty($s)): ?>
    <div class="other-content">
        <h1>
            検索キーワード:【<?php echo $s ?>】
        </h1>
    </div>
    <?php
    while ( have_posts() ) : the_post() ;
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
    if ( !empty($thumb['0']) ) {
        $thumbnailUrl = $thumb['0'];
    } else {
        $thumbnailUrl = get_template_directory_uri() . "/images/no-image.png";
    }
    ?>
                    <!-- 本文 -->
                    <div class="article-body">
                        <h2 class="article-title" itemprop="name headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="article-link thumbnail" style="background-image: url(<?= $thumbnailUrl ?>)">
                            <a href="<?php the_permalink(); ?>" itemprop="url" title="<?php printf(the_title_attribute('echo=0'));?>"></a>
                        </div>
                        <!-- Article description -->
                        <div class="article-description">
                            <p itemprop="description">
                                <?php echo get_post_meta($post->ID, '_aioseop_description', true); ?>
                            </p>
                        </div>
                        <!-- Readmore -->
                        <div class="read-more_btn">
                            <a href="<?php the_permalink(); ?>" itemprop="url">≫ Read More</a>
                        </div>
                        <!-- Footer -->
                        <div class="article-footer">
                            <div class="footer-wrap">
                                <div class="category ft-m">
                                    <p><i class="fas fa-tags icon"></i><span class="category-nm"><?php the_category(', '); ?></span></p>
                                </div>
                                <div class="post-time ft-m">
                                    <time>
                                        <p><i class="fas fa-clock icon"></i><?php the_time('Y/m/d'); ?></p>
                                    </time>
                                </div>            
                            </div>
                        </div>
                    </div>
    <?php endwhile; else:?>
    <h1>該当なし</h1>
    <?php endif ?>
                </section>
                <?php pagination( $wp_query->max_num_pages, get_query_var( 'paged' ) ); ?>
            </article>
            <?php get_sidebar(); ?>
        </div>
    </main>
<?php get_footer(); ?>