
<footer class="site-footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="foot-about">
                        <div class="site-title d-flex align-items-center">
                            <a href="/" rel="home"><span style="color: black;">UKH</span><span>ua</span></a>
                        </div>
                        <p>
                            Политика работы предприятия ориентирована на индивидуальный подход к каждому клиенту,
                            а так же на осуществление самых разнообразных поставок из любой страны мира.
                        </p>

                        <p class="footer-copyright">
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены.
                        </p>
                    </div><!-- .foot-about -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                    <div class="foot-contact">
                        <h2>Контакты</h2>

                        <ul>
                            <li>Email: info@ukh.com.ua</li>
                            <li>Phone: +38 (056) 787-38-05</li>
                        </ul>
                    </div><!-- .foot-contact -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                    <div class="quick-links flex flex-wrap">
                        <h2 class="w-100">Быстрые ссылки</h2>

                        <ul class="w-50">
                            <li>
                                @if($currentRoute === 'welcome')
                                    <a href="#about" style="white-space: nowrap;">О компании</a>
                                @else
                                    <a href="/#about" style="white-space: nowrap;">О компании</a>
                                @endif
                            </li>
                            <li><a href="{{ route('catalogue') }}">Каталог</a></li>
                            <li>
                                @if($currentRoute === 'welcome')
                                    <a href="#news" style="white-space: nowrap;">Новости</a>
                                @else
                                    <a href="/#news" style="white-space: nowrap;">Новости</a>
                                @endif
                            </li>
                            <li><a href="/contacts">Контакты</a></li>
                        </ul>
                    </div><!-- .quick-links -->
                </div><!-- .col -->

                <div class="col-12 col-md-6 col-lg-3 mt-5 mt-lg-0">
                    <div class="follow-us">
                        <h2>Подписывайтесь на нас</h2>

                        <ul class="follow-us flex flex-wrap align-items-center">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div><!-- .quick-links -->
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .footer-widgets -->
</footer><!-- .site-footer -->


<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/swiper.min.js'></script>
<script type='text/javascript' src='js/masonry.pkgd.min.js'></script>
<script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
<script type='text/javascript' src='js/custom.js'></script>
<script type='text/javascript' src='js/app.js'></script>

</body>
</html>