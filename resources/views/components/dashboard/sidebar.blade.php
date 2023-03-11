<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="@include('components.dashboard.logo')" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="@include('components.dashboard.logo')" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled mt-4" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="/dashboard">
                        <i class="uil-star"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="uil-star"></i>
                        <span>Продукты</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li><a href="{{route('product.index')}}">Все</a></li>
                        <li><a href="{{route('product.create')}}">Создать</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('brend.index')}}">
                        <i class="uil-star"></i>
                        <span>Марки</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('location.index')}}">
                        <i class="uil-star"></i>
                        <span>Выберите область</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('feedback.index')}}">
                        <i class="uil-star"></i>
                        <span>Обратная связь</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('korzina.index')}}">
                        <i class="uil-star"></i>
                        <span>Заказать</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('words.index') }}">
                        <i class="uil-star"></i>
                        <span>Словарь</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>