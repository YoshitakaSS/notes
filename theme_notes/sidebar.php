            <!-- sidebar -->
            <aside itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                <!-- Profile -->
                <div class="author-profile">
                    <div class="aside-container">
                        <div class="profile-info">
                            <img src="https://cdn.pixabay.com/photo/2017/05/13/12/40/fashion-2309519_960_720.jpg">
                            <h4 itemprop="author">Name</h4>
                            <div class="profile-txt">
                                <p>
									Inquisitive computer science specialist with 8+ years of experience. Looking to leverage strong programming skills as a developer for Google. Led a team of 11 coders at Halcyon-Berth Systems. Delivered projects an average of 10% before deadline, with 15% less errors than other teams. Trained 25 programmers in cloud computing skills.
                                </p>
                            </div>
                            <div class="prof-links">
                                <a href="#">≫ Profile</a>
                                <a href="#">≫ Contact</a>
                                <a href="#">≫ Privacy Policy</a>
                                <a href="#">≫ Profile</a>
                            </div>
                            <div class="sns-info">
                                <!-- 自分のSNSを埋め込んでください -->
                                <ul>
                                    <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                </ul>                                
                            </div>
                        </div>               
                    </div>
                </div>
                <!-- Search bar -->
                <div class="search-article form-group">
                    <form action="<?php echo home_url('/'); ?>" method="get">
                        <input type="text" name="s" placeholder="Search For...">
                        <i class="fas fa-search"></i>
                    </form>
                </div>
                <!-- Recent -->
                <div class="recent">
                    <h4>Recent Post</h4>
                    <div class="recent-articles">
                    <?php
                        $posts = get_posts('numberposts=5');
                        foreach($posts as $post):
                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail_size' );
                        if ( !empty($thumb['0']) ) {
                            $thumbnailUrl = $thumb['0'];
                        } else {
                            $thumbnailUrl = get_template_directory_uri() . "/images/no-image.png";
                        }
                    ?>
                        <div class="article_body">
                            <!-- サムネイル表示 -->
                            <div class="recent-link thumbnail" style="background-image: url(<?= $thumbnailUrl ?>)">
                                <a href="<?php the_permalink(); ?>"  title="<?php the_title(); ?>" itemprop="url" ></a>            
                            </div>
                            <!-- タイトル表示 -->
                            <h5 class="recent-title" itemprop="name headline">
                                <a href="<?php the_permalink(); ?>"  title="<?php printf(the_title_attribute('echo=0') ); ?>" itemprop="url">
                                    <?php the_title(); ?>
                                </a>
                            </h5>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Archive -->
                <div class="archive">
                    <h4>
                        Archive
                    </h4>
                    <ul class="archive-list">
                        <?php
                            $args = array(
                                'show_post_count' => true
                            );
                            wp_get_archives( $args ); 
                        ?> 
                    </ul>
                </div>
                <!-- Ads -->
                <div class="ads">

                </div>
            </aside>