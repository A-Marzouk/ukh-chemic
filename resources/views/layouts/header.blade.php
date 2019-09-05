<!DOCTYPE html>
<html lang="en">
<head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138593144-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-138593144-1');
</script>

    <title>Главная | Укрколорхим </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if(isset($product))
        <meta name="description" content="{{($product->meta_description)}}">
        <meta name="title" content="{{($product->seo_title)}}">
        <meta name="url" content="{{(url()->current())}}">
        <meta name="type" content="website">
        <meta name="image" content="https://ukh.com.ua/{{($product->photo)}}">
    @endif

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/elegant-fonts.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/style.css">
    {{--<link rel="stylesheet" href="/css/app.css">--}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="icon" href="/images/favicon-default.png">
</head>
<body>

<header class="site-header">
    <div class="top-header-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                    <div class="header-bar-email d-flex align-items-center">
                        <i class="fa fa-envelope"></i><a href="mailto:info@ukh.com.ua">info@ukh.com.ua</a>
                    </div><!-- .header-bar-email -->

                    <div class="header-bar-text lg-flex align-items-center">
                        <p><i class="fa fa-phone"></i><a href="tel:+38 (056) 787-38-05">+38 (056) 787-38-05</a></p>
                    </div><!-- .header-bar-text -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center" style="padding: 0;">
                    <div class="header-bar-search">
                        <form class="flex align-items-stretch" action="/catalogue" method="post">
                            <input type="search" placeholder="Поиск" name="keyword">
                            {{@csrf_field()}}
                            <button type="submit" value="" class="flex justify-content-center align-items-center"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- .header-bar-search -->

                    <div class="header-bar-menu">
                        <ul class="flex justify-content-center align-items-center py-2 pt-md-0">
                            <li><a href="#">
                                    <i class="fa fa-mobile-phone" style="color: greenyellow; font-size: 25px;padding-top: 5px;"></i>
                                </a>
                            </li>
                            <a href="javascript:void(0)"  data-toggle="modal" data-target="#order-phone-call" style="padding-top: 5px;">Заказать звонок</a>
                        </ul>
                    </div><!-- .header-bar-menu -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container-fluid -->
    </div><!-- .top-header-bar -->
    <div class="nav-bar p-0">
        <div class="container">
            <div class="row">
                <div class="col-9 col-lg-3">
                    <div class="site-branding">
                        <img src="/images/favicon-default.png" alt="logo" style="height: 90px ; margin-top: 5px;;">
                    </div><!-- .site-branding -->
                </div><!-- .col -->

                <div class="col-3 col-lg-9 flex justify-content-end align-content-center">
                    <nav class="site-navigation flex justify-content-end align-items-center">
                        <ul class="flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li class="@if($currentRoute === 'welcome')current-menu-item @endif" style="padding-left: 5px;"><a href="/">Главная</a></li>
                            <li>
                                @if($currentRoute === 'welcome')
                                    <a href="#about" style="white-space: nowrap;">О компании</a>
                                @else
                                    <a href="/#about" style="white-space: nowrap;">О компании</a>
                                @endif
                            </li>
                            <li class="@if($currentRoute === 'catalogue')current-menu-item @endif">
                                <a href="/catalogue">Каталог</a></li>
                            <li>
                                @if($currentRoute === 'welcome')
                                    <a href="#news" style="white-space: nowrap;">Новости</a>
                                @else
                                    <a href="/#news" style="white-space: nowrap;">Новости</a>
                                @endif
                            </li>
                            <li class="@if($currentRoute === 'contacts')current-menu-item @endif">
                                <a href="/contacts"  style="white-space: nowrap;">Контакты</a>
                            </li>
                        </ul>

                        <div class="hamburger-menu d-lg-none">
                            <span class="menu-span"></span>
                            <span class="menu-span"></span>
                            <span class="menu-span"></span>
                            <span class="menu-span"></span>
                        </div><!-- .hamburger-menu -->

                        <div class="header-bar-cart">
                            <a href="#" class="flex justify-content-center align-items-center"><span aria-hidden="true" class="icon_bag_alt"></span></a>
                        </div><!-- .header-bar-search -->
                    </nav><!-- .site-navigation -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .nav-bar -->
</header><!-- .site-header -->

{{-- modals --}}