@extends('layouts.front.main')

@section('style')
    <link rel="stylesheet" href="/css/swiper.min.css">
    <link rel="stylesheet" href="/css/fancybox.css">
@endsection

@section('content')
    <div class="wrapper">
        <section class="section__single">
            <div class="general__container">
                <div class="static">
                    <div class="static__box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2 2H3.74C4.82 2 5.67 2.93 5.58 4L4.75 13.96C4.71759 14.3459 4.76569 14.7342 4.89123 15.1005C5.01678 15.4669 5.21705 15.8031 5.47934 16.0879C5.74163 16.3728 6.06023 16.6001 6.41495 16.7553C6.76967 16.9106 7.15278 16.9905 7.54 16.99H18.19C19.63 16.99 20.89 15.81 21 14.38L21.54 6.88C21.66 5.22 20.4 3.87 18.73 3.87H5.82M9 8H21M16.25 22C16.5815 22 16.8995 21.8683 17.1339 21.6339C17.3683 21.3995 17.5 21.0815 17.5 20.75C17.5 20.4185 17.3683 20.1005 17.1339 19.8661C16.8995 19.6317 16.5815 19.5 16.25 19.5C15.9185 19.5 15.6005 19.6317 15.3661 19.8661C15.1317 20.1005 15 20.4185 15 20.75C15 21.0815 15.1317 21.3995 15.3661 21.6339C15.6005 21.8683 15.9185 22 16.25 22ZM8.25 22C8.58152 22 8.89946 21.8683 9.13388 21.6339C9.3683 21.3995 9.5 21.0815 9.5 20.75C9.5 20.4185 9.3683 20.1005 9.13388 19.8661C8.89946 19.6317 8.58152 19.5 8.25 19.5C7.91848 19.5 7.60054 19.6317 7.36612 19.8661C7.1317 20.1005 7 20.4185 7 20.75C7 21.0815 7.1317 21.3995 7.36612 21.6339C7.60054 21.8683 7.91848 22 8.25 22Z"
                                stroke="black" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <p class="general-M"><span class="static__count">37</span>
                            {{ __('asd.человек купили на этой неделе') }}</p>
                    </div>
                    <!-- /.static__box -->
                    <div class="static__box">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 17.27L18.18 21L16.54 13.97L22 9.24L14.81 8.63L12 2L9.19 8.63L2 9.24L7.46 13.97L5.82 21L12 17.27Z"
                                fill="#F5A623" />
                        </svg>
                        <p class="general-M">
                            {{ __('asd.Рейтинг товара') }} (<span class="rating__count">5.0</span>)
                        </p>
                    </div>
                    <!-- /.static__rating -->
                </div>
                {{-- @dd($product) --}}
                <!-- /.static -->
                <div class="single">
                    <div class="single__banner">
                        <div class="banner">
                            <button class="banner__btn banner__prev">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.5 20L12.5 15L17.5 10" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                            <div class="banner__slider">
                                <div class="swiper-wrapper">
                                    @foreach ($product->photos as $photo)
                                        <div class="swiper-slide">
                                            <div class="banner__item">
                                                <img src="{{ $photo }}" alt="">
                                            </div>
                                            <!-- /.banner__item -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.banner__slider -->
                            <button class="banner__btn banner__next">
                                <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12.5 20L17.5 15L12.5 10" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>

                            <div class="banner__pagination"></div>
                        </div>
                        <!-- /.banner -->
                    </div>
                    <!-- /.single__banner -->
                    <div class="single__main">
                        {{-- <h1 class="title general-SM">Защитный тент чехол для автомобилей Chevrolet Lacetti, Gentra, Cobalt, Nexia, Matiz, Spark</h1> --}}
                        <h1 class="title general-SM">{{ $product['name_' . $lang] }}</h1>
                        <!-- /.title -->
                        <form action="{{ route('orders.store') }}" method="POST" class="single__form">
                            @csrf
                            <label for="form__name" class="single__box">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.4425 16.5C15.4425 13.5975 12.555 11.25 9 11.25C5.445 11.25 2.5575 13.5975 2.5575 16.5M9 9C9.99456 9 10.9484 8.60491 11.6516 7.90165C12.3549 7.19839 12.75 6.24456 12.75 5.25C12.75 4.25544 12.3549 3.30161 11.6516 2.59835C10.9484 1.89509 9.99456 1.5 9 1.5C8.00543 1.5 7.05161 1.89509 6.34834 2.59835C5.64508 3.30161 5.25 4.25544 5.25 5.25C5.25 6.24456 5.64508 7.19839 6.34834 7.90165C7.05161 8.60491 8.00543 9 9 9Z"
                                        stroke="#E50000" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <input type="text" name="name" id="form__name" required class="general-R"
                                    placeholder="Ваше имя">
                            </label>
                            <!-- /.single__box -->
                            <label for="form__phone" class="single__box">
                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_33_728)">
                                        <path
                                            d="M16.4775 13.7475C16.4775 14.0175 16.4175 14.295 16.29 14.565C16.1625 14.835 15.9975 15.09 15.78 15.33C15.4125 15.735 15.0075 16.0275 14.55 16.215C14.1 16.4025 13.6125 16.5 13.0875 16.5C12.3225 16.5 11.505 16.32 10.6425 15.9525C9.78 15.585 8.9175 15.09 8.0625 14.4675C7.19108 13.8301 6.36877 13.1281 5.6025 12.3675C4.84408 11.604 4.14457 10.7842 3.51 9.915C2.895 9.06 2.4 8.205 2.04 7.3575C1.68 6.5025 1.5 5.685 1.5 4.905C1.5 4.395 1.59 3.9075 1.77 3.4575C1.95 3 2.235 2.58 2.6325 2.205C3.1125 1.7325 3.6375 1.5 4.1925 1.5C4.4025 1.5 4.6125 1.545 4.8 1.635C4.995 1.725 5.1675 1.86 5.3025 2.055L7.0425 4.5075C7.1775 4.695 7.275 4.8675 7.3425 5.0325C7.41 5.19 7.4475 5.3475 7.4475 5.49C7.4475 5.67 7.395 5.85 7.29 6.0225C7.1925 6.195 7.05 6.375 6.87 6.555L6.3 7.1475C6.2175 7.23 6.18 7.3275 6.18 7.4475C6.18 7.5075 6.1875 7.56 6.2025 7.62C6.225 7.68 6.2475 7.725 6.2625 7.77C6.3975 8.0175 6.63 8.34 6.96 8.73C7.2975 9.12 7.6575 9.5175 8.0475 9.915C8.4525 10.3125 8.8425 10.68 9.24 11.0175C9.63 11.3475 9.9525 11.5725 10.2075 11.7075C10.245 11.7225 10.29 11.745 10.3425 11.7675C10.4025 11.79 10.4625 11.7975 10.53 11.7975C10.6575 11.7975 10.755 11.7525 10.8375 11.67L11.4075 11.1075C11.595 10.92 11.775 10.7775 11.9475 10.6875C12.12 10.5825 12.2925 10.53 12.48 10.53C12.6225 10.53 12.7725 10.56 12.9375 10.6275C13.1025 10.695 13.275 10.7925 13.4625 10.92L15.945 12.6825C16.14 12.8175 16.275 12.975 16.3575 13.1625C16.4325 13.35 16.4775 13.5375 16.4775 13.7475Z"
                                            stroke="#E50000" stroke-width="1.5" stroke-miterlimit="10" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_33_728">
                                            <rect width="18" height="18" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <input type="tel" id="form__phone" name="phone" required
                                    class="general-R form__tel" placeholder="Номер телефона">
                            </label>
                            <!-- /.single__box -->
                            <fieldset>
                                <svg class="select-icon" width="18" height="18" viewBox="0 0 18 18"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.42 2.99998V12.75M11.7975 4.96498V15M1.7175 5.83498V13.1325C1.7175 14.5575 2.73 15.1425 3.96 14.4375L5.7225 13.4325C6.105 13.215 6.7425 13.1925 7.14 13.395L11.0775 15.3675C11.475 15.5625 12.1125 15.5475 12.495 15.33L15.7425 13.47C16.155 13.23 16.5 12.645 16.5 12.165V4.86748C16.5 3.44248 15.4875 2.85748 14.2575 3.56248L12.495 4.56748C12.1125 4.78498 11.475 4.80748 11.0775 4.60498L7.14 2.63998C6.7425 2.44498 6.105 2.45998 5.7225 2.67748L2.475 4.53748C2.055 4.77748 1.7175 5.36248 1.7175 5.83498Z"
                                        stroke="#E50000" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <select name="location" id="sources"class="custom-select sources"
                                    data-placeholder="Выберите область">
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}">{{ $location['name_' . $lang] }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                            @if ($product->brend_check == 1)
                                <fieldset>
                                    <svg class="select-icon" width="18" height="18" viewBox="0 0 18 18"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.7528 13.8771V15.0025C15.7528 15.4167 15.4167 15.7529 15.0025 15.7529H13.5019C13.0877 15.7529 12.7516 15.4167 12.7516 15.0025V13.8771"
                                            stroke="#E50000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M5.24844 13.8771V15.0025C5.24844 15.4167 4.9123 15.7529 4.49813 15.7529H2.9975C2.58333 15.7529 2.24719 15.4167 2.24719 15.0025V13.8771"
                                            stroke="#E50000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2.24719 13.877V10.3078C2.24719 9.71053 2.48429 9.13804 2.90672 8.71636L3.74782 7.87451H14.2522L15.0933 8.71561C15.5157 9.13804 15.7528 9.71053 15.7528 10.3078V13.877H2.24719Z"
                                            stroke="#E50000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M15.7528 10.8757L13.5019 11.0633" stroke="#E50000" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M4.49813 11.0633L2.24719 10.8757" stroke="#E50000" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M5.99875 13.877L6.74906 11.6261H11.2509L12.0012 13.877" stroke="#E50000"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15.7528 7.12422L14.2522 7.49938" stroke="#E50000" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M3.74782 7.49938L2.24719 7.12422" stroke="#E50000" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path
                                            d="M3.7478 7.87452V7.49486L4.37506 5.14113C4.5934 4.31954 5.33771 3.7478 6.18707 3.7478H11.8774C12.7456 3.7478 13.5004 4.34355 13.7022 5.1884L14.2522 7.49486V7.87452"
                                            stroke="#E50000" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>

                                    <select name="brend" id="sources" class="custom-select sources"
                                        data-placeholder="Марка машины">
                                        @foreach ($brends as $brend)
                                            <option value="{{ $brend->id }}">{{ $brend->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            @endif
                            <div class="single__container">
                                <div class="box">
                                    <p class="subtitle general-R">{{ __('asd.Цена по акции:') }}</p>
                                    <!-- /.subtitle -->
                                    <h4 class="price general-SM">
                                        {{ $product->price }}
                                        <span>{{ __('asd.Сум') }}</span>
                                    </h4>
                                    <!-- /.price -->
                                </div>
                                <!-- /.box -->
                                <button type="submit" ch class="general-SM">{{ __('asd.Заказать') }}</button>
                            </div>
                            <!-- /.single__container -->
                        </form>
                        <!-- /.single__form -->
                    </div>
                    <!-- /.single__main -->
                </div>
                <!-- /.single -->
            </div>
            <!-- /.general__container -->
        </section>
        <!-- /.section__single -->

        <section class="section__features">
            <div class="general__container">
                <div class="features">
                    <div class="features__item">
                        <div class="features__pic">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.9625 8.2999C23.425 5.5874 21.4125 4.3999 18.6125 4.3999H7.63745C4.33745 4.3999 2.13745 6.0499 2.13745 9.8999V16.3374C2.13745 19.1124 3.27495 20.7374 5.14995 21.4374C5.42495 21.5374 5.72495 21.6249 6.03745 21.6749C6.53745 21.7874 7.07495 21.8374 7.63745 21.8374H18.625C21.925 21.8374 24.125 20.1874 24.125 16.3374V9.8999C24.125 9.3124 24.075 8.7874 23.9625 8.2999ZM6.91245 14.9999C6.91245 15.5124 6.48745 15.9374 5.97495 15.9374C5.46245 15.9374 5.03745 15.5124 5.03745 14.9999V11.2499C5.03745 10.7374 5.46245 10.3124 5.97495 10.3124C6.48745 10.3124 6.91245 10.7374 6.91245 11.2499V14.9999ZM13.125 16.4249C11.3 16.4249 9.82495 14.9499 9.82495 13.1249C9.82495 11.2999 11.3 9.8249 13.125 9.8249C14.95 9.8249 16.425 11.2999 16.425 13.1249C16.425 14.9499 14.95 16.4249 13.125 16.4249ZM21.1999 14.9999C21.1999 15.5124 20.7749 15.9374 20.2624 15.9374C19.7499 15.9374 19.325 15.5124 19.325 14.9999V11.2499C19.325 10.7374 19.7499 10.3124 20.2624 10.3124C20.7749 10.3124 21.1999 10.7374 21.1999 11.2499V14.9999Z"
                                    fill="white" />
                                <path
                                    d="M27.8774 13.6474V20.0849C27.8774 23.9349 25.6774 25.5974 22.3649 25.5974H11.3899C10.4524 25.5974 9.6149 25.4599 8.8899 25.1849C8.3024 24.9724 7.7899 24.6599 7.3774 24.2599C7.1524 24.0474 7.3274 23.7099 7.6399 23.7099H18.6149C23.2399 23.7099 25.9899 20.9599 25.9899 16.3474V9.89742C25.9899 9.59742 26.3274 9.40992 26.5399 9.63492C27.3899 10.5349 27.8774 11.8474 27.8774 13.6474Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <!-- /.features__pic -->
                        <p class="features__description general-M">{{ __('asd.Оплата после доставки и проверки Вами') }}
                        </p>
                        <!-- /.features__description -->
                    </div>
                    <!-- /.features__item -->

                    <div class="features__item">
                        <div class="features__pic">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M26.875 19.375C27.225 19.375 27.5 19.65 27.5 20V21.25C27.5 23.325 25.825 25 23.75 25C23.75 22.9375 22.0625 21.25 20 21.25C17.9375 21.25 16.25 22.9375 16.25 25H13.75C13.75 22.9375 12.0625 21.25 10 21.25C7.9375 21.25 6.25 22.9375 6.25 25C4.175 25 2.5 23.325 2.5 21.25V18.75C2.5 18.0625 3.0625 17.5 3.75 17.5H15.625C16.4538 17.5 17.2487 17.1708 17.8347 16.5847C18.4208 15.9987 18.75 15.2038 18.75 14.375V7.5C18.75 6.8125 19.3125 6.25 20 6.25H21.05C21.95 6.25 22.775 6.7375 23.225 7.5125L24.025 8.9125C24.1375 9.1125 23.9875 9.375 23.75 9.375C22.9212 9.375 22.1263 9.70424 21.5403 10.2903C20.9542 10.8763 20.625 11.6712 20.625 12.5V16.25C20.625 17.0788 20.9542 17.8737 21.5403 18.4597C22.1263 19.0458 22.9212 19.375 23.75 19.375H26.875Z"
                                    fill="white" />
                                <path
                                    d="M10 27.5C10.663 27.5 11.2989 27.2366 11.7678 26.7678C12.2366 26.2989 12.5 25.663 12.5 25C12.5 24.337 12.2366 23.7011 11.7678 23.2322C11.2989 22.7634 10.663 22.5 10 22.5C9.33696 22.5 8.70107 22.7634 8.23223 23.2322C7.76339 23.7011 7.5 24.337 7.5 25C7.5 25.663 7.76339 26.2989 8.23223 26.7678C8.70107 27.2366 9.33696 27.5 10 27.5ZM20 27.5C20.663 27.5 21.2989 27.2366 21.7678 26.7678C22.2366 26.2989 22.5 25.663 22.5 25C22.5 24.337 22.2366 23.7011 21.7678 23.2322C21.2989 22.7634 20.663 22.5 20 22.5C19.337 22.5 18.7011 22.7634 18.2322 23.2322C17.7634 23.7011 17.5 24.337 17.5 25C17.5 25.663 17.7634 26.2989 18.2322 26.7678C18.7011 27.2366 19.337 27.5 20 27.5ZM27.5 15.6625V17.5H23.75C23.0625 17.5 22.5 16.9375 22.5 16.25V12.5C22.5 11.8125 23.0625 11.25 23.75 11.25H25.3625L27.175 14.425C27.3875 14.8 27.5 15.225 27.5 15.6625ZM16.35 2.5H7.1125C6.04344 2.5003 5.00768 2.87195 4.1823 3.5514C3.35693 4.23086 2.7932 5.17591 2.5875 6.225H8.05C8.525 6.225 8.9 6.6125 8.9 7.0875C8.9 7.5625 8.525 7.9375 8.05 7.9375H2.5V9.6625H5.75C6.225 9.6625 6.6125 10.05 6.6125 10.525C6.6125 11 6.225 11.375 5.75 11.375H2.5V13.1H3.4625C3.9375 13.1 4.325 13.4875 4.325 13.9625C4.325 14.4375 3.9375 14.8125 3.4625 14.8125H2.5V15.1C2.5 15.7875 3.0625 16.35 3.75 16.35H15.1875C16.4625 16.35 17.5 15.3125 17.5 14.0375V3.65C17.5 3.0125 16.9875 2.5 16.35 2.5ZM2.5875 6.225H1.175C0.7 6.225 0.3125 6.6125 0.3125 7.0875C0.3125 7.5625 0.7 7.9375 1.175 7.9375H2.5V7.1125C2.5 6.8125 2.5375 6.5125 2.5875 6.225ZM2.3125 9.6625H1.175C0.7 9.6625 0.3125 10.05 0.3125 10.525C0.3125 11 0.7 11.375 1.175 11.375H2.5V9.6625H2.3125ZM2.3125 13.1H1.175C0.7 13.1 0.3125 13.4875 0.3125 13.9625C0.3125 14.4375 0.7 14.8125 1.175 14.8125H2.5V13.1H2.3125Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <!-- /.features__pic -->
                        <p class="features__description general-M">
                            {{ __('asd.Быстрая доставка курьером на дом по Ташкенту') }}</p>
                        <!-- /.features__description -->
                    </div>
                    <!-- /.features__item -->

                    <div class="features__item">
                        <div class="features__pic">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22 6.63883L14.9375 2.83883C14.5704 2.64188 14.1603 2.53882 13.7438 2.53882C13.3272 2.53882 12.9171 2.64188 12.55 2.83883L5.50001 6.63883C4.98751 6.92633 4.66251 7.47633 4.66251 8.07633C4.66251 8.68883 4.97501 9.23883 5.50001 9.51383L12.5625 13.3138C12.9273 13.5108 13.3354 13.6139 13.75 13.6139C14.1646 13.6139 14.5727 13.5108 14.9375 13.3138L22 9.51383C22.5125 9.23883 22.8375 8.68883 22.8375 8.07633C22.8375 7.47633 22.5125 6.92633 22 6.63883ZM11.4 14.6376L4.83751 11.3626C4.59204 11.2375 4.31854 11.1775 4.04325 11.1885C3.76795 11.1996 3.50011 11.2811 3.26542 11.4255C3.03073 11.5698 2.83708 11.772 2.70305 12.0127C2.56901 12.2534 2.4991 12.5246 2.50001 12.8001V19.0001C2.50001 20.0751 3.10001 21.0376 4.06251 21.5251L10.625 24.8001C10.85 24.9126 11.1 24.9751 11.35 24.9751C11.6375 24.9751 11.9375 24.8876 12.2 24.7376C12.675 24.4376 12.9625 23.9251 12.9625 23.3626V17.1626C12.95 16.0876 12.35 15.1251 11.4 14.6376ZM25 12.8001V15.8751C24.4 15.7001 23.7625 15.6251 23.125 15.6251C21.425 15.6251 19.7625 16.2126 18.45 17.2626C16.65 18.6751 15.625 20.8126 15.625 23.1251C15.625 23.7376 15.7 24.3501 15.8625 24.9376C15.675 24.9126 15.4875 24.8376 15.3125 24.7251C14.8375 24.4376 14.55 23.9251 14.55 23.3626V17.1626C14.55 16.0876 15.15 15.1251 16.1 14.6376L22.6625 11.3626C22.908 11.2375 23.1815 11.1775 23.4568 11.1885C23.7321 11.1996 23.9999 11.2811 24.2346 11.4255C24.4693 11.5698 24.6629 11.772 24.797 12.0127C24.931 12.2534 25.0009 12.5246 25 12.8001Z"
                                    fill="white" />
                                <path
                                    d="M27.4751 19.5874C26.9502 18.9405 26.2869 18.4194 25.5342 18.0624C24.7814 17.7055 23.9582 17.5219 23.1251 17.5249C21.8001 17.5249 20.5751 17.9874 19.6126 18.7624C18.9506 19.2856 18.4164 19.9525 18.0504 20.7126C17.6844 21.4728 17.4962 22.3063 17.5001 23.1499C17.502 23.9835 17.6892 24.8061 18.0481 25.5584C18.4069 26.3107 18.9285 26.9739 19.5751 27.4999H19.5876C20.5501 28.2999 21.7876 28.7749 23.1251 28.7749C24.5501 28.7749 25.8376 28.2499 26.8251 27.3749C27.4281 26.8483 27.9118 26.1989 28.2438 25.4703C28.5758 24.7417 28.7484 23.9506 28.7501 23.1499C28.7501 21.7999 28.2751 20.5499 27.4751 19.5874ZM25.9501 22.4499L22.9501 25.2249C22.7751 25.3874 22.5376 25.4749 22.3126 25.4749C22.0751 25.4749 21.8376 25.3874 21.6501 25.1999L20.2626 23.8124C20.0882 23.636 19.9904 23.398 19.9904 23.1499C19.9904 22.9019 20.0882 22.6639 20.2626 22.4874C20.6251 22.1249 21.2251 22.1249 21.5876 22.4874L22.3376 23.2374L24.6751 21.0749C25.0501 20.7249 25.6501 20.7499 26.0001 21.1249C26.3626 21.5124 26.3376 22.0999 25.9501 22.4499Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <!-- /.features__pic -->
                        <p class="features__description general-M">
                            {{ __('asd.В случае заводского брака обменяем товар') }}</p>
                        <!-- /.features__description -->
                    </div>
                    <!-- /.features__item -->

                    <div class="features__item">
                        <div class="features__pic">
                            <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M26.9111 13.5861L25.0111 11.6861C24.6861 11.3611 24.4236 10.7236 24.4236 10.2736V7.57363C24.4236 6.47363 23.5236 5.57363 22.4236 5.57363H19.7361C19.2861 5.57363 18.6486 5.31113 18.3236 4.98613L16.4236 3.08613C15.6486 2.31113 14.3736 2.31113 13.5986 3.08613L11.6736 4.98613C11.3611 5.31113 10.7236 5.57363 10.2611 5.57363H7.57363C6.47363 5.57363 5.57363 6.47363 5.57363 7.57363V10.2611C5.57363 10.7111 5.31113 11.3486 4.98613 11.6736L3.08613 13.5736C2.31113 14.3486 2.31113 15.6236 3.08613 16.3986L4.98613 18.2986C5.31113 18.6236 5.57363 19.2611 5.57363 19.7111V22.3986C5.57363 23.4986 6.47363 24.3986 7.57363 24.3986H10.2611C10.7111 24.3986 11.3486 24.6611 11.6736 24.9861L13.5736 26.8861C14.3486 27.6611 15.6236 27.6611 16.3986 26.8861L18.2986 24.9861C18.6236 24.6611 19.2611 24.3986 19.7111 24.3986H22.3986C23.4986 24.3986 24.3986 23.4986 24.3986 22.3986V19.7111C24.3986 19.2611 24.6611 18.6236 24.9861 18.2986L26.8861 16.3986C27.6986 15.6361 27.6986 14.3611 26.9111 13.5861ZM9.99863 11.2486C9.99863 10.5611 10.5611 9.99863 11.2486 9.99863C11.9361 9.99863 12.4986 10.5611 12.4986 11.2486C12.4986 11.9361 11.9486 12.4986 11.2486 12.4986C10.5611 12.4986 9.99863 11.9361 9.99863 11.2486ZM11.9111 19.4111C11.7236 19.5986 11.4861 19.6861 11.2486 19.6861C11.0111 19.6861 10.7736 19.5986 10.5861 19.4111C10.4118 19.2347 10.314 18.9967 10.314 18.7486C10.314 18.5006 10.4118 18.2626 10.5861 18.0861L18.0861 10.5861C18.4486 10.2236 19.0486 10.2236 19.4111 10.5861C19.7736 10.9486 19.7736 11.5486 19.4111 11.9111L11.9111 19.4111ZM18.7486 19.9986C18.0486 19.9986 17.4861 19.4361 17.4861 18.7486C17.4861 18.0611 18.0486 17.4986 18.7361 17.4986C19.4236 17.4986 19.9861 18.0611 19.9861 18.7486C19.9861 19.4361 19.4361 19.9986 18.7486 19.9986Z"
                                    fill="white" />
                            </svg>
                        </div>
                        <!-- /.features__pic -->
                        <p class="features__description general-M">{{ __('asd.Скидки и акции постоянным клиентам') }}</p>
                        <!-- /.features__description -->
                    </div>
                    <!-- /.features__item -->
                </div>
                <!-- /.features -->
            </div>
            <!-- /.general__container -->
        </section>
        <!-- /.section__features -->
    </div>
    <!-- /.wrapper -->

    @include('components.front.footer')
@endsection

@section('script')
    <script>
        function choose(id) {
            $('#product_id').val(id);
        }
    </script>
    <script src="/js/swiper.min.js"></script>
    <script src="/js/fancybox.umd.js"></script>
    <script>
        let swiperAbout = new Swiper(".banner__slider", {
            // slidesPerView: "auto",
            centeredSlides: true,
            slidesPerView: 1,
            effect: "fade",
            pagination: {
                el: ".banner__pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".banner__next",
                prevEl: ".banner__prev",
            },
        });
    </script>
@endsection
