@extends('layouts.front.main')

@section('style')
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/fancybox.css">
@endsection
@section('content')
    <div class="preloader" style="display: none">
        <div class="preloader__logo">

        </div>
    </div>

    <div class="wrapper">
        <section class="section__success">
            <div class="general__container">
                <div class="success">
                    <div class="success__content">
                        <div class="success__icon">
                            <svg width="40" height="29" viewBox="0 0 40 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 14.2553L14.0914 26L38.8 2" stroke="white" stroke-width="3"/>
                            </svg>
                        </div>
                        <!-- /.success__icon -->
                        <h1 class="success__title general-SM">
                            Спасибо, ваша<br>
                            заявка принята!
                        </h1>
                        <p class="success__subtitle general-L">В ближайшее время с вами свяжется наш специалист.</p>
                        <!-- /.success__subtitle -->
                        <!-- /.success__title -->
                    </div>
                    <!-- /.success__content -->
                </div>
                <!-- /.success -->
            </div>
            <!-- /.general__container -->
        </section>
        <!-- /.section__success -->
        <section class="section__products">
            <div class="general__container">
                <h1 class="title general-M">
                    Другие товары
                    <span class="count general-SM">24</span>
                </h1>
                <!-- /.title -->
                <div class="products">
                    <?php for ($i = 1; $i <= 5; $i++):?>
                    <div class="products__item">
                        <div class="products__item-pic">
                            <img src="<?php echo '/img/products/'.$i.'.jpg'; ?>" alt="">
                        </div>
                        <!-- /.products__item-pic -->
                        <div class="products__item-content">
                            <h3 class="products__name">Автомобильный вентилятор салона на присосках, 12-24В</h3>
                            <!-- /.products__name -->
                            <div class="products__item-bottom">
                                <h4 class="price general-SM">
                                    136.000
                                    <span class="general-M">Cум</span>
                                </h4>
                                <!-- /.price -->
                                <a href="" class="more general-SM">Заказать</a>
                                <!-- /. -->
                            </div>
                            <!-- /.products__item-bottom -->
                        </div>
                        <!-- /.product__item-content -->
                    </div>
                    <!-- /.products__item -->
                    <?php endfor ?>
                </div>
                <!-- /.products -->
                <a href="" class="products__update general-M">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.4881 4.63892V8.17492H15.9531H19.4881" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19.027 8.175C17.67 5.688 15.032 4 12 4C7.582 4 4 7.582 4 12C4 16.418 7.582 20 12 20C16.418 20 20 16.418 20 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>Загрузить еще</span>
                </a>
                <!-- /.products__update -->
            </div>
            <!-- /.general__container -->
        </section>
        <!-- /.section__products -->
    </div>
    <!-- /.wrapper -->
    @include('components.front.footer')
@endsection

@section('script')
    <script src="/js/swiper.min.js"></script>
    <script src="/js/fancybox.umd.js"></script>
@endsection

