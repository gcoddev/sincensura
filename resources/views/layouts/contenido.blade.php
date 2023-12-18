@extends('inicio')

@section('contenido_home')
    <section class="binduz-er-video-post-4-area home-12-video-post pt-60">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-9">

                    <div class="binduz-er-recent-news-box">
                        <div class="binduz-er-recent-news-title">
                            <h3 class="binduz-er-title">Noticias actuales</h3>
                        </div>
                        @foreach ($publicaciones as $pub)
                            <div class="binduz-er-recent-news-item mb-20">
                                <div class="binduz-er-thumb p-3" style="width:480px;height:300px;">
                                    <img src="{{ asset('storage/publicaciones/' . $pub->imagen) }}" alt="imagen"
                                        class="w-100 h-100" style="object-fit:cover;object-position:top;">
                                </div>
                                <div class="binduz-er-content">
                                    <div class="binduz-er-meta-item">
                                        <div class="binduz-er-meta-categories">
                                            <a href="{{ url('admin/categoria', $pub->id_categoria) }}">{{ strtoupper($pub->categoria->nombre) }}</a>
                                        </div>
                                        <div class="binduz-er-meta-date">
                                            <span><i class="fal fa-calendar-alt"></i> {{ $pub->creado_el }}</span>
                                        </div>
                                    </div>
                                    <h5 class="binduz-er-title"><a
                                            href="{{ route('noticia', $pub->id_contenido) }}">{{ strtoupper($pub->titulo) }}</a>
                                    </h5>
                                    @if ($pub->descripcion != null)
                                        <p>{{ $pub->descripcion }}</p>
                                    @endif
                                    @if ($pub->autor != null)
                                        <p><b>Por: </b>{{ $pub->autor }}</p>
                                    @endif
                                    @if ($pub->fuente != null)
                                        <p><b>Por: </b>{{ $pub->fuente }}</p>
                                    @endif
                                    <a href="{{ route('noticia', $pub->id_contenido) }}"
                                        class="text-decoration-underline float-end leer-mas">Leer mas</a>
                                </div>
                            </div>
                        @endforeach

                        {{-- {{ $publicaciones->links() }}
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true"><i class="fal fa-long-arrow-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item active"><a class="binduz-er-page-link" href="#">01</a></li>
                            <li class="page-item"><a class="binduz-er-page-link" href="#">02</a></li>
                            <li class="page-item"><a class="binduz-er-page-link" href="#">---</a></li>
                            <li class="page-item"><a class="binduz-er-page-link" href="#">10</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true"><i class="fal fa-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}
                        @if ($publicaciones->lastPage() > 1)
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item {{ $publicaciones->currentPage() == 1 ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $publicaciones->previousPageUrl() }}"
                                            aria-label="Previous">
                                            <span aria-hidden="true"><i class="fal fa-long-arrow-left"></i></span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $publicaciones->lastPage(); $i++)
                                        <li class="page-item {{ $publicaciones->currentPage() == $i ? 'active' : '' }}">
                                            <a class="binduz-er-page-link"
                                                href="{{ $publicaciones->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li
                                        class="page-item {{ $publicaciones->currentPage() == $publicaciones->lastPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $publicaciones->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true"><i class="fal fa-long-arrow-right"></i></span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        @endif

                    </div>

                    <div class="row">
                        <div class=" col-lg-5">
                            <div class="binduz-er-video-post binduz-er-top-news-2-slider mt-40">
                                <div class="binduz-er-latest-news-item">
                                    <div class="binduz-er-thumb">
                                        <img src="{{ asset('assets/images/top-news-item-1.jpg') }}" alt="">
                                    </div>
                                    <p>ANUNCIO</p>
                                </div>
                                <div class="binduz-er-latest-news-item">
                                    <div class="binduz-er-thumb">
                                        <img src="{{ asset('assets/images/top-news-item-1.jpg') }}" alt="">
                                    </div>
                                    <p>ANUNCIO</p>
                                </div>
                                <div class="binduz-er-latest-news-item">
                                    <div class="binduz-er-thumb">
                                        <img src="{{ asset('assets/images/top-news-item-1.jpg') }}" alt="">
                                    </div>
                                    <p>ANUNCIO</p>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-7">
                            <div class="binduz-er-top-news-2-item mt-40">
                                <div class="binduz-er-trending-news-item"
                                    style="background-image: url({{ asset('storage/publicaciones/' . $publicacionPopular->imagen) }});object-fit:cover!important;object-position:top!important;">
                                    <div class="binduz-er-trending-news-overlay">
                                        <div class="binduz-er-trending-news-meta">
                                            <div class="binduz-er-meta-categories">
                                                <a
                                                    href="{{ url('admin/categoria', $publicacionPopular->id_categoria) }}">{{ strtoupper($publicacionPopular->categoria->nombre) }}</a>
                                            </div>
                                            <div class="binduz-er-meta-date">
                                                <span><i class="fal fa-calendar-alt"></i>
                                                    {{ $publicacionPopular->creado_el }}</span>
                                            </div>
                                            <div class="binduz-er-trending-news-title">
                                                <h3 class="binduz-er-title"><a
                                                        href="{{ route('noticia', $publicacionPopular->id_contenido) }}">{{ $publicacionPopular->titulo }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="binduz-er-news-share">
                                            <a href="#"><i class="fal fa-share"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class=" col-lg-4">
                            <div class="binduz-er-video-post-box">
                                <div class="binduz-er-video-post-title">
                                    <h3 class="binduz-er-title">Video Post</h3>
                                </div>
                                <div class="binduz-er-video-post">
                                    <div class="binduz-er-latest-news-item">
                                        <div class="binduz-er-thumb">
                                            <img src="{{ asset('assets/images/video-post-1.jpg') }}" alt="">
                                            <div class="binduz-er-play">
                                                <a class="binduz-er-video-popup" href="#"><i
                                                        class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                        <div class="binduz-er-content">
                                            <div class="binduz-er-meta-item">
                                                <div class="binduz-er-meta-date">
                                                    <span><i class="fal fa-calendar-alt"></i>24th February 2020</span>
                                                </div>
                                            </div>
                                            <h5 class="binduz-er-title"><a href="#">Sping Fashion Show snow of
                                                    Michigan rotation.</a></h5>
                                        </div>
                                    </div>
                                    <div class="binduz-er-latest-news-item">
                                        <div class="binduz-er-thumb">
                                            <img src="{{ asset('assets/images/video-post-2.jpg') }}" alt="">
                                            <div class="binduz-er-play">
                                                <a class="binduz-er-video-popup" href="#"><i
                                                        class="fas fa-play"></i></a>
                                            </div>
                                        </div>
                                        <div class="binduz-er-content">
                                            <div class="binduz-er-meta-item">
                                                <div class="binduz-er-meta-date">
                                                    <span><i class="fal fa-calendar-alt"></i>24th February 2020</span>
                                                </div>
                                            </div>
                                            <h5 class="binduz-er-title"><a href="#">Sping Fashion Show snow of
                                                    Michigan rotation.</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" col-lg-8">
                            <div class="binduz-er-video-post-box">
                                <div class="binduz-er-trending-video-news-title">
                                    <h3 class="binduz-er-title">Trending News</h3>
                                </div>
                                <div class="tab-content" id="pills-tabContent-2">
                                    <div class="tab-pane fade show active" id="pills-item-1" role="tabpanel"
                                        aria-labelledby="pills-item-1-tab">
                                        <div class="binduz-er-trending-video-play-news">
                                            <div class="binduz-er-top-news-2-item">
                                                <div class="binduz-er-trending-news-item mb-30">
                                                    <div class="binduz-er-trending-news-overlay">
                                                        <div class="binduz-er-trending-news-meta">
                                                            <div class="binduz-er-meta-categories">
                                                                <a href="#">Technology</a>
                                                            </div>
                                                            <div class="binduz-er-meta-date">
                                                                <span><i class="fal fa-calendar-alt"></i> 24th February
                                                                    2020</span>
                                                            </div>
                                                            <div class="binduz-er-trending-news-title">
                                                                <h3 class="binduz-er-title"><a href="#">Spring
                                                                        Fashion Show at the University of Michigan Has
                                                                        Started.</a></h3>
                                                            </div>

                                                        </div>
                                                        <div class="binduz-er-trending-play">
                                                            <a href="#"><i class="fas fa-play"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-item-2" role="tabpanel"
                                        aria-labelledby="pills-item-2-tab">
                                        <div class="binduz-er-trending-video-play-news">
                                            <div class="binduz-er-top-news-2-item">
                                                <div class="binduz-er-trending-news-item  item-2 mb-30">
                                                    <div class="binduz-er-trending-news-overlay">
                                                        <div class="binduz-er-trending-news-meta">
                                                            <div class="binduz-er-meta-categories">
                                                                <a href="#">Technology</a>
                                                            </div>
                                                            <div class="binduz-er-meta-date">
                                                                <span><i class="fal fa-calendar-alt"></i> 24th February
                                                                    2020</span>
                                                            </div>
                                                            <div class="binduz-er-trending-news-title">
                                                                <h3 class="binduz-er-title"><a href="#">Spring
                                                                        Fashion Show at the University of Michigan Has
                                                                        Started.</a></h3>
                                                            </div>

                                                        </div>
                                                        <div class="binduz-er-trending-play">
                                                            <a href="#"><i class="fas fa-play"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-item-3" role="tabpanel"
                                        aria-labelledby="pills-item-3-tab">
                                        <div class="binduz-er-trending-video-play-news">
                                            <div class="binduz-er-top-news-2-item">
                                                <div class="binduz-er-trending-news-item  item-3 mb-30">
                                                    <div class="binduz-er-trending-news-overlay">
                                                        <div class="binduz-er-trending-news-meta">
                                                            <div class="binduz-er-meta-categories">
                                                                <a href="#">Technology</a>
                                                            </div>
                                                            <div class="binduz-er-meta-date">
                                                                <span><i class="fal fa-calendar-alt"></i> 24th February
                                                                    2020</span>
                                                            </div>
                                                            <div class="binduz-er-trending-news-title">
                                                                <h3 class="binduz-er-title"><a href="#">Spring
                                                                        Fashion Show at the University of Michigan Has
                                                                        Started.</a></h3>
                                                            </div>

                                                        </div>
                                                        <div class="binduz-er-trending-play">
                                                            <a href="#"><i class="fas fa-play"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="binduz-er-trending-video-thumbs">
                                    <ul class="nav nav-pills" id="pills-tab-trending" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="pills-item-1-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-item-1" type="button" role="tab"
                                                aria-controls="pills-item-1" aria-selected="true"><img
                                                    src="{{ asset('assets/images/trending-news-item-1.jpg') }}"
                                                    alt=""></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-item-2-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-item-2" type="button" role="tab"
                                                aria-controls="pills-item-2" aria-selected="false"><img
                                                    src="{{ asset('assets/images/trending-news-item-2.jpg') }}"
                                                    alt=""></button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="pills-item-3-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-item-3" type="button" role="tab"
                                                aria-controls="pills-item-3" aria-selected="false"><img
                                                    src="{{ asset('assets/images/trending-news-item-3.jpg') }}"
                                                    alt=""></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="binduz-er-footer-add pt-35">
                    <div class="binduz-er-footer-add-item text-center">
                        <span class="mb-10 d-inline-block">ORG</span>
                        <img src="{{ asset('banner.png') }}" alt="">
                    </div>
                </div> --}}




                </div>
                <div class=" col-lg-3">
                    @include('components.aside')
                </div>
            </div>
        </div>
    </section>

    <!--====== BINDUZ VIDEO POST 4 PART ENDS ======-->

    <!--====== BINDUZ TRENDING NEWS BOX PART START ======-->

    <section class="binduz-er-trending-news-box-area pb-40">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="binduz-er-trending-news-box">
                        <div
                            class="binduz-er-trending-news-topbar d-block d-md-flex justify-content-between align-items-center">
                            <h3 class="binduz-er-title">Publicaciones por categoria</h3>
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                {{-- <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="todos-noticias" data-bs-toggle="pill"
                                        href="#noticias-all" role="tab" aria-controls="noticias-all"
                                        aria-selected="true">Todos</a>
                                </li> --}}
                                @foreach ($categorias as $key => $item)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                            id="tab_{{ $item->id_categoria }}" data-bs-toggle="pill"
                                            href="#tab_item_{{ $item->id_categoria }}" role="tab"
                                            aria-controls="tab_item_{{ $item->id_categoria }}"
                                            aria-selected="false">{{ $item->nombre }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            {{-- <div class="tab-pane fade show active" id="noticias-all" role="tabpanel"
                                aria-labelledby="todos-noticias">
                                <div class="row">
                                    @foreach ($publicacionesAll as $key => $pubs)
                                        <div class=" col-lg-3 col-md-6">
                                            <div class="binduz-er-video-post binduz-er-recently-viewed-item">
                                                <div class="binduz-er-latest-news-item">
                                                    <div class="binduz-er-thumb">
                                                        <img src="{{ asset('storage/publicaciones/' . $pubs->imagen) }}"
                                                            alt="" width="320" height="200"
                                                            style="object-fit:cover;object-position:top;">
                                                    </div>
                                                    <div class="binduz-er-content">
                                                        <div class="binduz-er-meta-item">
                                                            <div class="binduz-er-meta-categories">
                                                                <a
                                                                    href="{{ url('admin/categoria', $pubs->id_categoria) }}">{{ strtoupper($pubs->categoria->nombre) }}</a>
                                                            </div>
                                                            <div class="binduz-er-meta-date">
                                                                <span><i
                                                                        class="fal fa-calendar-alt"></i>{{ $pubs->creado_el }}</span>
                                                            </div>
                                                        </div>
                                                        <h5 class="binduz-er-title"><a
                                                                href="#">{{ strtoupper($pubs->titulo) }}</a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}

                            @foreach ($categorias as $key => $item)
                                <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}"
                                    id="tab_item_{{ $item->id_categoria }}" role="tabpanel"
                                    aria-labelledby="tab_{{ $item->id_categoria }}">
                                    <div class="row">
                                        @foreach ($publicacionesAll as $pub)
                                            @if ($item->id_categoria == $pub->id_categoria)
                                                <div class=" col-lg-3 col-md-6">
                                                    <div class="binduz-er-video-post binduz-er-recently-viewed-item">
                                                        <div class="binduz-er-latest-news-item">
                                                            <div class="binduz-er-thumb">
                                                                <img src="{{ asset('storage/publicaciones/' . $pub->imagen) }}"
                                                                    alt="" width="320" height="200"
                                                                    style="object-fit:cover;object-position:top;">
                                                            </div>
                                                            <div class="binduz-er-content">
                                                                <div class="binduz-er-meta-item">
                                                                    <div class="binduz-er-meta-categories">
                                                                        <a
                                                                            href="{{ url('admin/categoria', $pub->id_categoria) }}">{{ strtoupper($pub->categoria->nombre) }}</a>
                                                                    </div>
                                                                    <div class="binduz-er-meta-date">
                                                                        <span><i
                                                                                class="fal fa-calendar-alt"></i>{{ $pub->creado_el }}</span>
                                                                    </div>
                                                                </div>
                                                                <h5 class="binduz-er-title"><a
                                                                        href="{{ route('noticia', $pub->id_contenido) }}">{{ strtoupper($pub->titulo) }}</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
