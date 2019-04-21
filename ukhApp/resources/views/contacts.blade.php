@extends('layouts.user')

@section('content')
    <div class="contact-page">
        <div class="page-header">
            <div class="page-header-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <header class="entry-header">
                                <h1>Контакты</h1>
                            </header><!-- .entry-header -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .page-header-overlay -->
        </div><!-- .page-header -->
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs">
                    <ul class="flex flex-wrap align-items-center p-0 m-0">
                        <li><a href="/"><i class="fa fa-home"></i> Главная страница</a></li>
                        <li>Контакты</li>
                    </ul>
                </div><!-- .breadcrumbs -->
            </div><!-- .col -->
        </div><!-- .row -->

        <div class="row justify-content-between">
            <div class="col-12">
                <div class="contact-gmap">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2647.4062098255285!2d35.036922115659245!3d48.42954307924783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbfcb356ef2c8d%3A0xcd57ecf771f55c32!2sHaharina+Ave%2C+74%2C+Dnipropetrovs&#39;k%2C+Dnipropetrovs&#39;ka+oblast%2C+49000!5e0!3m2!1sen!2sua!4v1551868832775" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div><!-- .contact-gmap -->
            </div><!-- .col -->

            <div class="col-12 col-lg-6">
                <div class="contact-form">
                    <h3>Контактная форма </h3>

                    <form>
                        <input type="text" placeholder="Имя..">
                        <input type="email" placeholder="Почта..">
                        <input type="text" placeholder="Тема..">
                        <textarea placeholder="Сообщение.." rows="4"></textarea>
                        <input type="submit" value="Отправить">
                    </form>
                </div><!-- .contact-form -->
            </div><!-- .col -->

            <div class="col-12 col-lg-6">
                <div class="contact-info">
                    <h3>Контактные данные</h3>
                    <ul class="p-0 m-0">
                        <li><span>Адрес:</span>49000, г. Днепропетровск, пр. Гагарина 74, оф. 405</li>
                        <li><span>Почта:</span><a href="mailto:info@ukh.com.ua">info@ukh.com.ua</a></li>
                        <li><span>Контактные телефоны:</span>
                            <a href="tel:+38 (056) 787-38-05">+38 (056) 787-38-05</a><br/>
                            <a href="tel:+38 (063) 641-88-30">+38 (063) 641-88-30</a>
                        </li>
                    </ul>
                </div><!-- .contact-info -->
            </div><!-- .col -->
        </div><!-- .row -->
    </div><!-- .container -->

@endsection