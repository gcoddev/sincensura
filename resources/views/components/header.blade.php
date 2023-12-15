<div class="binduz-er-news-off_canvars_overlay"></div>
<div class="binduz-er-news-offcanvas_menu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="binduz-er-news-offcanvas_menu_wrapper">
                    <div class="binduz-er-news-canvas_close">
                        <a href="javascript:void(0)"><i class="fal fa-times"></i></a>
                    </div>
                    {{-- <div class="binduz-er-news-header-social">
                        <ul class="text-center">
                            <li><a href="#">facebook</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">Skype</a></li>
                        </ul>
                    </div> --}}
                    <div id="menu" class="text-left ">
                        <ul class="binduz-er-news-offcanvas_main_menu">
                            <li class="binduz-er-news-menu-item-has-children binduz-er-news-active">
                                <a href="{{ route('inicio') }}">Inicio</a>
                            </li>
                            @foreach ($categorias as $item)
                                <li class="binduz-er-news-menu-item-has-children">
                                    <a href="#">{{ $item->nombre }} </a>
                                </li>
                            @endforeach
                            <li class="binduz-er-news-menu-item-has-children">
                                <a href="{{ route('login') }}">Acceder </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--====== OFFCANVAS MENU PART ENDS ======-->

<!--====== SEARCH PART START ======-->

<div class="binduz-er-news-search-box">
    <div class="binduz-er-news-search-header">
        <div class=" container mt-60">
            <div class="row">
                <div class=" col-6">
                    <img src="{{ asset('assets/images/logo-4.png') }}" alt=""> <!-- search title -->
                </div>
                <div class=" col-6">
                    <div class="binduz-er-news-search-close float-end">
                        <button class="binduz-er-news-search-close-btn">Close <span></span><span></span></button>
                    </div> <!-- search close -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- search header -->
    <div class="binduz-er-news-search-body">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="binduz-er-news-search-form">
                        <form action="#">
                            <input type="text" placeholder="Search for Products">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- search body -->
</div>

<!--====== SEARCH PART ENDS ======-->

<!--====== BINDUZ TOP HEADER PART START ======-->

<div class="binduz-er-top-header-area-4 bg_cover d-none d-lg-block">
    <div class=" container">
        <div class="row align-items-center">
            <div class=" col-lg-6 col-md-7">
                <div class="binduz-er-top-header-lang">
                    <div class="binduz-er-select-item">
                        <select id="idioma">
                            <option value="es" selected>Español</option>
                            <option value="en">English</option>
                            <option value="ay">Aymara</option>
                        </select>
                    </div>
                </div>
                <div class="binduz-er-top-header-weather">
                    <ul>
                        <li class="me-3">
                            <i class="fal fa-clock"></i> <span id="hora-actual"></span>
                        </li>
                        <li><i class="fal fa-cloud"></i> <span id="clima-actual"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class=" col-lg-6 col-md-5">
                <div class="binduz-er-topbar-headline float-end">
                    @foreach ($publicacionesAll as $item)
                        <p><span><i class="fas fa-bolt"></i> {{ $item->categoria->nombre }}:</span> <a
                                href="#">{{ $item->titulo }}</a></p>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
<div class="binduz-er-top-header-ad pt-30 pb-30 d-none d-lg-block">
    <div class=" container">
        <div class="row">
            <div class=" col-lg-12">
                <img src="{{ asset('banner.png') }}" alt="" width="1370" height="130"
                    style="object-fit:cover;object-position:top;">
            </div>
        </div>
    </div>

</div>

<!--====== BINDUZ TOP HEADER PART ENDS ======-->

<!--====== BINDUZ HEADER PART START ======-->

<header class="binduz-er-header-area binduz-er-header-area-4">
    <div class="binduz-er-header-nav">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="binduz-er-header-meddle-bar d-flex justify-content-between">
                        <div class="binduz-er-logo">
                            <a href="#"><img src="{{ asset('logo.jpeg') }}" alt=""></a>
                        </div>
                        <div class="navigation">
                            <nav class="navbar navbar-expand-lg">
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.html">Inicio</a>
                                        </li>
                                        @foreach ($categorias as $item)
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">{{ $item->nombre }} </a>
                                            </li>
                                        @endforeach
                                        <li class="nav-item">
                                            <a class="nav-link text-danger" href="{{ route('login') }}">acceder </a>
                                        </li>
                                    </ul>
                                </div> <!-- navbar collapse -->
                                <div class="binduz-er-navbar-btn d-flex align-items-center">
                                    <div class="binduz-er-search-btn d-none d-sm-block">
                                        <a class="binduz-er-news-search-open" href="#"><i
                                                class="far fa-search"></i></a>
                                    </div>
                                    <span class="binduz-er-toggle-btn binduz-er-news-canvas_open d-block d-lg-none">
                                        <i class="fal fa-bars"></i>
                                    </span>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
