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
                                <h1>Динамично развивающаяся компания <br/><span class="secondHeader">Создана опытными специалистами-химиками</span></h1>
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>
                                    Осуществляет поставки химического сырья и пищевых добавок точно в срок и с удобной для клиента регулярностью.
                                </p>
                            </div><!-- .entry-content -->

                            <footer class="entry-footer read-more">
                                <a href="#about">Подробнее</a>
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
                @if(isset($news[0]))
                    <div class="col-12">
                        <header class="heading flex justify-content-between align-items-center">
                            <h2 class="entry-title" style="color: #19c880; font-weight:400; ">Новости</h2>
                        </header><!-- .heading -->
                    </div><!-- .col -->

                    <div class="col-12 col-lg-6">
                        <div class="featured-event-content">
                            <figure class="event-thumbnail position-relative m-0">
                                <a href="{{$news[0]->link}}"><img src="{{$news[0]->photo}}" alt=""></a>

                                <div class="posted-date position-absolute">
                                    <div class="day">{{date('d',strtotime($news[0]->date))}}</div>
                                    <div class="month">{{date('M',strtotime($news[0]->date))}}</div>
                                </div><!-- .posted-date -->
                            </figure><!-- .event-thumbnail -->

                            <header class="entry-header flex flex-wrap align-items-center">
                                <h2 class="entry-title"><a href="{{$news[0]->link}}">
                                       {{$news[0]->title}}
                                    </a>
                                </h2>

                                <div class="event-location"><i class="fa fa-link"></i>
                                    <a href="{{$news[0]->link}}" class="event-location">
                                        {{$news[0]->link_text}}
                                    </a>.
                                </div>

                                <div class="event-duration"><i class="fa fa-calendar"></i>{{date('Y',strtotime($news[0]->date))}} года.</div>
                            </header><!-- .entry-header -->
                        </div><!-- .featured-event-content -->
                    </div><!-- .col -->
                @endif


                <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                    @if(isset($news[1]))
                        <div class="event-content flex flex-wrap justify-content-between align-content-stretch">
                        <figure class="event-thumbnail">
                            <a href="{{$news[1]->link}}"><img src="{{$news[1]->photo}}" alt="news image" width="100%" height="220px"></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="event-content-wrap">
                            <header class="entry-header">
                                <div class="posted-date">
                                    <i class="fa fa-calendar"></i> {{date('d',strtotime($news[1]->date))}} {{date('M',strtotime($news[1]->date))}} {{date('Y',strtotime($news[1]->date))}}
                                </div><!-- .posted-date -->

                                <h2 class="entry-title"><a href="{{$news[1]->link}}">{{$news[1]->title}}</a></h2>

                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="post-author"><a href="{{$news[1]->link}}">{{$news[1]->link_text}}</a></div>
                                </div><!-- .entry-meta -->

                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>{{$news[1]->description}}</p>
                            </div><!-- .entry-content -->
                        </div><!-- .event-content-wrap -->
                    </div><!-- .event-content -->
                    @endif
                    @if(isset($news[2]))
                        <div class="event-content flex flex-wrap justify-content-between align-content-stretch">
                        <figure class="event-thumbnail">
                            <a href="{{$news[2]->link}}"><img src="{{$news[2]->photo}}" alt="news image" width="100%" height="220px"></a>
                        </figure><!-- .course-thumbnail -->

                        <div class="event-content-wrap">
                            <header class="entry-header">
                                <div class="posted-date">
                                    <i class="fa fa-calendar"></i> {{date('d',strtotime($news[2]->date))}} {{date('M',strtotime($news[2]->date))}} {{date('Y',strtotime($news[2]->date))}}
                                </div><!-- .posted-date -->

                                <h2 class="entry-title"><a href="{{$news[2]->link}}">{{$news[2]->title}}</a></h2>
                                <div class="entry-meta flex flex-wrap align-items-center">
                                    <div class="post-author"><a href="{{$news[2]->link}}">{{$news[2]->link_text}}</a></div>
                                </div><!-- .entry-meta -->
                            </header><!-- .entry-header -->

                            <div class="entry-content">
                                <p>{{$news[2]->description}}</p>
                            </div><!-- .entry-content -->
                        </div><!-- .event-content-wrap -->
                    </div><!-- .event-content -->
                    @endif
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