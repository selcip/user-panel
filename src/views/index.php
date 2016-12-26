<?php
include("assets/misc/header.php");
?>

<header class="nk-header nk-header-opaque">
  <div class="nk-contacts-top">
    <div class="container">
      <div class="nk-contacts-left">
        <ul class="nk-social-links">
          <li><a class="nk-social-facebook" href="#"><span class="fa fa-facebook"></span></a></li>
        </ul>
      </div>
    </div>
  </div>
    <nav class="nk-navbar nk-navbar-top nk-navbar-sticky">
        <div class="container">
            <div class="nk-nav-table">
                <a href="#" class="nk-nav-logo">
                    <img src="http://i.imgur.com/cGe2BQL.png" alt="GoodGames" width="199">
                </a>
                <ul class="nk-nav nk-nav-right hidden-md-down" data-nav-mobile="#nk-nav-mobile">
                    <li>
                        <a href="#">
                            INÍCIO
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            FÓRUM
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            RANKING
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            DOWNLOAD
                        </a>
                    </li>
                    <li class=" nk-drop-item">
                        <a href="#">
                            PAINEL DO USUÁRIO
                        </a>
                        <ul class="dropdown">
                            <li>
                                <a href="#">
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Registro
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nk-nav nk-nav-right nk-nav-icons">
                    <li class="single-icon hidden-lg-up">
                        <a href="#" class="no-link-effect" data-nav-toggle="#nk-nav-mobile">
                            <span class="nk-icon-burger">
                            <span class="nk-t-1"></span>
                            <span class="nk-t-2"></span>
                            <span class="nk-t-3"></span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div id="nk-nav-mobile" class="nk-navbar nk-navbar-side nk-navbar-right-side nk-navbar-overlay-content hidden-lg-up">
    <div class="nano">
        <div class="nano-content">
            <a href="index.html" class="nk-nav-logo">
                <img src="http://i.imgur.com/cGe2BQL.png" alt="" width="120">
            </a>
            <div class="nk-navbar-mobile-content">
                <ul class="nk-nav">

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="nk-main">
    <div class="nk-gap-2"></div>
    <div class="container">
        <div class="nk-image-slider" data-autoplay="8000">
          <div class="nk-image-slider-item">
            <img src="http://i.imgur.com/dj9MeyS.png" alt="" class="nk-image-slider-img" data-thumb="http://i.imgur.com/dj9MeyS.png">
          </div>

            <div class="nk-image-slider-item">
                <img src="http://i.imgur.com/nsQbh1z.png" alt="" class="nk-image-slider-img" data-thumb="http://i.imgur.com/nsQbh1z.png">
                <div class="nk-image-slider-content">
                  <?php $util->siteNews(0); ?>
                </div>
            </div>

            <div class="nk-image-slider-item">
                <img src="http://i.imgur.com/Vu7c1fn.png" alt="" class="nk-image-slider-img" data-thumb="http://i.imgur.com/Vu7c1fn.png">

                <div class="nk-image-slider-content">
                    <?php $util->siteNews(1); ?>
                </div>

            </div>

            <div class="nk-image-slider-item">
                <img src="http://i.imgur.com/fEq7oCW.png" alt="" class="nk-image-slider-img" data-thumb="http://i.imgur.com/fEq7oCW.png">
                <div class="nk-image-slider-content">
                    <?php $util->siteNews(2); ?>
                </div>
            </div>
        </div>

    <div class="nk-gap-2"></div>

    <div class="row vertical-gap multi-columns-row">
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="assets/images/btn-1.png" alt="">
                </div>
                <div class="nk-feature-cont">
                    <text class="nk-feature-title text-main-1"><a href="#">REGISTRO</a></text>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="assets/images/btn-2.png" alt="">
                </div>
                <div class="nk-feature-cont">
                    <text class="nk-feature-title text-main-1"><a href="#">DOAR</a></text>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="nk-feature-1">
                <div class="nk-feature-icon">
                    <img src="assets/images/btn-3.png" alt="">
                </div>
                <div class="nk-feature-cont">
                    <text class="nk-feature-title text-main-1"><a href="#">DOWNLOAD</a></text>
                </div>
            </div>
        </div>
    </div>

    <div class="nk-gap-2"></div>

    <h3 class="nk-decorated-h-2"><span><span style="color: hsla(0, 0%, 0%, 0.7)">MELHORES JOGADORES</span></span>
    </h3>

    <div class="nk-gap"></div>

    <div class="nk-news-box">
        <div class="nk-news-box-list">
            <div class="nano">
                <div class="nano-content">
                    <?php $util->top5(); ?>
                </div>
            </div>
        </div>
        <div class="nk-news-box-each-info">
            <div class="nano">
                <div class="nano-content">
                    <!-- There will be inserted info about selected news-->
                    <div class="nk-news-box-item-image" style="background-image: url('assets/images/post-1.jpg');">
                        <span class="nk-news-box-item-categories">
                    <span class="bg-main-4">#</span>
                        </span>
                    </div>
                    <h3 class="nk-news-box-item-title">LOADING</h3>
                    <div class="nk-news-box-item-text">
                        <p>LOADING</p>
                    </div>
                    <div class="nk-news-box-item-status">
                        <table class="nk-table">
                            <thead>
                                <tr>
                                    <td class="text-center">FOR</td>
                                    <td class="text-center">DES</td>
                                    <td class="text-center">INT</td>
                                    <td class="text-center">SOR</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center" id="forval"></td>
                                    <td class="text-center" id="desval"></td>
                                    <td class="text-center" id="intval"></td>
                                    <td class="text-center" id="sorval"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="nk-gap-2"></div>

    <div class="nk-gap-2"></div>
    <div class="row equal-height vertical-gap hidden-sm-down">
        <div class="col-lg-12">
            <h3 class="nk-decorated-h-2"><span style='color: black;'>REDES SOCIAIS</span></h3>
            <div class="nk-gap"></div>
            <div class="nk-blog-grid">
                <div class="row multi-columns-row">
                    <div class="col-md-4">
                      <div class="nk-blog-post">
                            <div class="fb-page" style='border: solid 1px black' data-href="https://www.facebook.com/idmstory" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/idmstory" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/idmstory">IDMStory</a></blockquote></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="nk-blog-post">
                          <div class="fb-page" data-href="https://www.facebook.com/nhost" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/nhost" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/nhost">NeonHost</a></blockquote></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="nk-widget nk-widget-highlighted">
                            <h4 class="nk-widget-title"><span><span class="text-main-1">DESTAQUES</span> DA SEMANA</span>
                            </h4>
                            <div class="nk-widget-content">
                                <div class="nk-widget-post">
                                    <a href="blog-article.html" class="nk-post-image">
                                        <img src="assets/images/1-top3.png" alt="">
                                    </a>
                                    <?php $util->semanalNews(0); ?>
                                </div>

                                <div class="nk-widget-post">
                                    <a href="blog-article.html" class="nk-post-image">
                                        <img src="assets/images/2-top3.png" alt="">
                                    </a>
                                    <?php $util->semanalNews(1); ?>
                                </div>

                                <div class="nk-widget-post">
                                    <a href="blog-article.html" class="nk-post-image">
                                        <img src="assets/images/3-top3.png" alt="">
                                    </a>
                                    <?php $util->semanalNews(2); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

<div class="nk-gap-4"></div>

<img class="nk-page-background-top" src="assets/images/bg-top.png" alt="">
<?php
include("assets/misc/footer.php");
?>
