<!-- パンくず -->
<div class="breadcrumb">
    <ul class="breadcrumb-list" itemscope itemtype="http://schema.org/BreadcrumbList">
        <li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
            <a href="<?php echo home_url(); ?>" itemprop="item"><span itemprop="name">Home
			</span></a><meta itemprop="position" content="1">&nbsp;&gt;&nbsp;
			</li>
			<li itemscope itemprop="itemListElement" itemtype="http://schema.org/ListItem">
            <?php if ( is_single() ) { ?>
            <a href="<?php $category = get_the_category(); echo get_category_link($category[0]->cat_ID); ?>" itemprop="item"><span itemprop="name"><?php echo $category[0]->name; ?>
				<meta itemprop="position" content="2"></span></a>&nbsp;&gt;&nbsp;
			        </li>	
            <?php } else { ?>
            <?php } ?>
			<li>
            <span class="breadcrumb-list_last" itemprop="name"><?php the_title(); ?></span>
        </li>
    </ul>
</div>