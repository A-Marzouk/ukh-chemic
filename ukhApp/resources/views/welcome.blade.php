@extends('layouts.user')

@section('content')
    <div class="hero-content" id="mainSection">
        <div class="hero-content-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="hero-content-wrap flex flex-column justify-content-center align-items-start">
                            <header class="entry-header">
                                <h4>Укрколорхим</h4>
                                <h1>Динамично компания <br/><span class="secondHeader">Создана опытными специалистами-химиками</span></h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>
                                    Осуществляет поставки химического сырья и пищевых добавок точно в срок и с удобной для клиента регулярностью.
                                </p>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer read-more">
                                <a href="#">Подробнее</a>
                            </footer><!-- .entry-footer -->
                        </div><!-- .hero-content-wrap -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .hero-content-hero-content-overlay -->
    </div><!-- .hero-content -->

    <section class="about-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="padding: 0;">
                    <h2 class="entry-title" style="color: #19c880;">Укрколорхим</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 align-content-lg-stretch" style="padding: 0;">
                    <header class="heading">
                        <p>
                            динамично развивающаяся компания, создана опытными специалистами-химиками.<br/>
                            специализируется на поставках сырья для производства лаков, красок и смол.
                        </p>
                    </header><!-- .heading -->

                    <div class="entry-content ezuca-stats">
                        <ul class="p-0 m-0 green-ticked" style="color:#757686;">
                            <li>Сырье для органорастворимых ЛКМ.</li>
                            <li>Сырье для ЛКМ на водной основе.</li>
                            <li>Наполнители.</li>
                            <li>Пигменты</li>
                            <li>Различные добавки</li>
                        </ul>
                    </div><!-- .ezuca-stats -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 flex align-content-center mt-5 mt-lg-0">
                    <div class="ezuca-video position-relative">
                        <img src="images/lab-min.jpg" style="border-radius: 3px;" alt="">
                    </div><!-- .ezuca-video -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .about-section -->
    <section class="latest-news-events" id="news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <header class="heading flex justify-content-between align-items-center">
                        <h2 class="entry-title" style="color: #19c880; font-weight:400; ">Новости</h2>
                    </header><!-- .heading -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6">
                    <div class="featured-event-content">
                        <figure class="event-thumbnail position-relative m-0">
                            <a href="#"><img src="images/green-chemicals-min.png" alt=""></a>

                            <div class="posted-date position-absolute">
                                <div class="day">23</div>
                                <div class="month">mar</div>
                            </div><!-- .posted-date -->
                        </figure><!-- .event-thumbnail -->

                        <header class="entry-header flex flex-wrap align-items-center">
                            <h2 class="entry-title"><a href="#">
                                    Лорем ипсум долор сит амет, яуандо ерудити яуи еу, ехплицари витуператорибус ут.
                                </a>
                            </h2>

                            <div class="event-location"><i class="fa fa-map-marker"></i>40 Baуia улица 133/2 Киев, Украина</div>

                            <div class="event-duration"><i class="fa fa-calendar"></i>10 - 12 Дек</div>
                        </header><!-- .entry-header -->
                    </div><!-- .featured-event-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                    <div class="event-content flex flex-wrap justify-content-between align-content-stretch">
                        <figure class="event-thumbnail">
                            <a href="#"><img src="images/36270_galleryImage-min.jpg" alt="news image" width="100%" height="220px"></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="event-content-wrap">
                            <header class="entry-header">
                                <div class="posted-date">
                                    <i class="fa fa-calendar"></i> 22 Мар 2019
                                </div><!-- .posted-date -->

                                <h2 class="entry-title"><a href="#">Лорем ипсум долор сит, ехплицари витуператорибус ут.</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="post-author"><a href="#">Ms. Lara Croft </a></div>

                                    <div class="post-comments">02 коммент  </div>
                                </div><!-- .entry-meta -->
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>Лорем ипсум долор сит амет, яуандо ерудити яуи еу, ехплицари витуператорибус ут.</p>
                            </div><!-- .entry-content -->
                        </div><!-- .event-content-wrap -->
                    </div><!-- .event-content -->

                    <div class="event-content flex flex-wrap justify-content-between align-content-lg-stretch">
                        <figure class="event-thumbnail">
                            <a href="#"><img src="images/event-3.jpg" alt=""></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="event-content-wrap">
                            <header class="entry-header">
                                <div class="posted-date">
                                    <i class="fa fa-calendar"></i> 22 Maр 2019
                                </div><!-- .posted-date -->

                                <h2 class="entry-title"><a href="#">витуператорибус ут.</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="post-author"><a href="#">Ms. Lara Croft </a></div>

                                    <div class="post-comments">02 коммент  </div>
                                </div><!-- .entry-meta -->
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>Лорем ипсум долор сит амет, яуандо ерудити яуи еу, ехплицари витуператорибус ут.</p>
                            </div><!-- .entry-content -->
                        </div><!-- .event-content-wrap -->
                    </div><!-- .event-content -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </section><!-- .latest-news-events -->


    <div class="clients-logo" style="margin-top: 0; margin-bottom: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-12 flex flex-wrap justify-content-center justify-content-lg-between align-items-center">
                    <div class="logo-wrap">
                        <img src="images/logo-1.png" alt="">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="images/logo-2.png" alt="">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="images/logo-3.png" alt="">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="images/logo-4.png" alt="">
                    </div><!-- .logo-wrap -->

                    <div class="logo-wrap">
                        <img src="images/logo-5.png" alt="">
                    </div><!-- .logo-wrap -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .clients-logo -->
@endsection