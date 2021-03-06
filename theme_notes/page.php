<?php get_header(); ?>
                    <div class="article-body single">
                        <h1 class="article-title"><?php the_title(); ?></h1>
                        <!-- 本文詳細 -->
                        <div class="article-main-txt">

                        <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                        <?php endwhile; ?>
                        </div>
								<?php get_template_part( 'sns' ); ?>
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
                </section>
            </article>
            <?php get_sidebar(); ?>
        </div>
    </main>
    <?php get_template_part( 'fixed-bar' ); ?>
<?php get_footer(); ?>    
