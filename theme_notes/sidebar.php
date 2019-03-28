            <!-- sidebar -->
            <aside itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
                <!-- Profile -->
                <div class="author-profile">
                    <div class="aside-container">
                        <div class="profile-info">
                            <img src="http://placehold.jp/250x250.png?text=Profile">
                            <h4 itemprop="author">User Name</h4>
                            <div class="profile-txt">
                                <p>
                                    enter profile info
                                    Dummy Profile Dummy Profile Dummy Profile Dummy Profile
                                    Dummy Profile
                                    Dummy Profile Dummy Profile Dummy Profile Dummy Profile
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