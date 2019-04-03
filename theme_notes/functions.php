<?php

/**
 * メニューバーのカスタマイズ
 */
add_theme_support('menus');

/**
 * サムネイルの利用
 */
add_theme_support('post-thumbnails');

/**
 * ページネーネーションの利用
 * @param float $pages 全ページ数
 * @param int $currentPage 現在のページ
 * @param int $range 左右表示幅
 * @param boolean $showOnly 1ページの場合
 */

function pagination($pages, $currentPage, $range = 2, $showOnly = false ) {

    $pages = (int) $pages;    //float型で渡ってくるので明示的に int型 へ
    $currentPage = $currentPage ?: 1;       //get_query_var('currentPage')をそのまま投げても大丈夫なように

    // 表示テキスト
    $text_first   = "« 最初へ";
    $text_before  = "‹ 前へ";
    $text_next    = "次へ ›";
    $text_last    = "最後へ »";

    if ( $showOnly && $pages === 1 ) {
        // １ページのみで表示設定が true の時
        echo '<div class="pagination"><span class="current pager">1</span></div>';
        return;
    }

    // 2ページ以上投稿がある場合
    if (1 != $pages) {
        echo '<div class="pagination">';
        if ($currentPage > $range + 1 ) {
            // 「最初へ」 の表示
            echo '<a href="', get_pagenum_link(1) ,'" class="first">', $text_first ,'</a>';
        }

        if ($currentPage > 1 ) {
            // 「前へ」 の表示
            echo '<a href="', get_pagenum_link( $currentPage - 1 ) ,'" class="prev">', $text_before ,'</a>';
        }

        // ページ間のリンクを生成
        for ($i = 1; $i <= $pages; $i++) {
            if ( $i <= $currentPage + $range && $i >= $currentPage - $range ) {
                // $currentPage +- $range 以内であればページ番号を出力
                if ( $currentPage === $i ) {
                    echo '<span class="current pager">', $i ,'</span>';
                } else {
                    echo '<a href="', get_pagenum_link( $i ) ,'" class="pager">', $i ,'</a>';
                }
            }
        }

        if ( $currentPage < $pages ) {
            // 「次へ」 の表示
            echo '<a href="', get_pagenum_link( $currentPage + 1 ) ,'" class="next">', $text_next ,'</a>';
        }
        if ( $currentPage + $range < $pages ) {
            // 「最後へ」 の表示
            echo '<a href="', get_pagenum_link( $pages ) ,'" class="last">', $text_last ,'</a>';
        }
        echo '</div>';
    }
}

/**
 * Wordpressにおける画像指定を削除
 */
add_filter('image_send_to_editor', 'remove_image_attribute', 10);
add_filter('post_thumbnail_html', 'remove_image_attribute', 10);
function remove_image_attribute($html){
	 $html = preg_replace('/(width|height)="\d*"\s/', '', $html); // width と heifht を削除
	 return $html;
}

/**
 * Wordpress独自の読み込みを削除
 */
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');

/**
 * WordpressにおけるjQuery自動読み込みを削除
 */
function replace_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
	}
}
add_action('init', 'replace_jquery');
