$(function() {

    /**
     * モバイル用のメニューの処理
     */
    var $navBar = $('.nav-bar');
    var $navMenu = $('.header-menu_nav');

    $navBar.on('click', function (){
        if ($(this).hasClass('fa-bars')) {
            $(this).removeClass('fa-bars');
            $(this).addClass('fa-times');
            $navMenu.slideDown();
            
        } else {
            $(this).removeClass('fa-times');
            $(this).addClass('fa-bars');
            $navMenu.slideUp();
        }
        
    });


    /**
     * 固定バーの処理
     */
    var $socialbar = $('#js-social-bar');
    var start = 0;
    //スクロールが発生した際に実行
    $(window).on('scroll', function(){
        //ユーザーのスクロール位置取得　& スクロール方向で分岐
        if ($(this).scrollTop() < start ){
        //上スクロール時の処理を記述
            $socialbar.fadeIn();
        }else{
        //下スクロール時の処理を記述
            $socialbar.fadeOut();
        }
        //スクロールが停止した位置を保持
        start = $(this).scrollTop();
    });


});