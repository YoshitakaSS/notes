<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
    <?php
    global $page, $paged;
    if(is_front_page()):
    elseif(is_single() | is_page() | is_archive() | is_search()):
    wp_title('|',true,'right');
    elseif(is_404()):
    echo'404 |';
    endif;
    bloginfo('name');
    if($paged >= 2 || $page >= 2):
    echo'-'.sprintf('%sページ',
    max($paged,$page));
    endif;?>
    </title>
    <!-- 文字コードの指定 -->
    <meta charset="utf-8">
    <!-- IEで常に標準モードで表示させる -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- viewport(レスポンシブ対応) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(is_category() | is_archive() | is_search() | is_tag() | is_paged()): ?>
    <meta name="robots" content="noindex,follow">
    <?php endif; ?>
	<!-- seo -->
	 <?php wp_head(); ?>
    <!-- css -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
</head>
<body>
    <header itemscope="itemscope" itemtype="http://schema.org/WPHeader">
        <div class="container header-nav-container">
            <h1 class="header-top-logo">
                <a href="<?php echo home_url(); ?>">
                    <?php bloginfo( 'name' ); ?>
                </a>
            </h1>
            <?php get_template_part( 'nav-menu' ); ?>
    </header>
    <main itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">
        <div class="container wrap">
            <article>
                <!-- 記事一覧 -->
                <section class="article-main-contents wrap"  itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">