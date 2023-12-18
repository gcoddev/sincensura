@extends('inicio')

@section('contenido_home')
    <div class="binduz-er-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="binduz-er-breadcrumb-box">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#"></a>Publicación</li>
                                <li class="breadcrumb-item active" aria-current="page">{{ strtoupper($publicacion->titulo) }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="binduz-er-author-item-area pb-20">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-9">
                    <div class="binduz-er-author-item mb-40">
                        <div class="binduz-er-thumb">
                            <img src="{{ asset('storage/publicaciones/' . $publicacion->imagen) }}" alt="">
                        </div>
                        <div class="binduz-er-content">
                            <div class="binduz-er-meta-item">
                                <div class="binduz-er-meta-categories">
                                    <a href="#">{{ strtoupper($publicacion->categoria->nombre) }}</a>
                                </div>
                                <div class="binduz-er-meta-date">
                                    <span><i class="fal fa-calendar-alt"></i>{{ $publicacion->creado_el }}</span>
                                </div>
                            </div>
                            <h3 class="binduz-er-title">{{ $publicacion->titulo }}</h3>
                            <div class="binduz-er-meta-author">
                                <div class="binduz-er-author">
                                    {{-- <img src="{{ asset('assets/images/user-2.jpg') }}" alt=""> --}}
                                    @if ($publicacion->autor)
                                        <span>Por <span>{{ $publicacion->autor }}</span></span>
                                    @endif
                                </div>
                                <div class="binduz-er-meta-list">
                                    <ul>
                                        <li><i class="fal fa-eye"></i> {{ $publicacion->vistas }}</li>
                                        {{-- <li><i class="fal fa-heart"></i> 5k</li> --}}
                                        <li><i class="fal fa-comments"></i>
                                            {{ count($publicacion->comentario($publicacion->id_contenido)) }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="binduz-er-blog-details-box">
                            @if ($publicacion->descripcion || $publicacion->fuente)
                                <div class="binduz-er-quote-text">
                                    @if ($publicacion->descripcion)
                                        <p>{{ $publicacion->descripcion }}</p>
                                    @endif
                                    @if ($publicacion->fuente)
                                        <span>fuente <span>{{ $publicacion->fuente }}</span></span>
                                    @endif
                                </div>
                            @endif
                            {{-- <div class="row">
                                <div class=" col-lg-6">
                                    <div class="binduz-er-blog-details-thumb mt-25">
                                        <img src="{{ asset('assets/images/blog-details-thumb-1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class=" col-lg-6">
                                    <div class="binduz-er-blog-details-thumb mt-25">
                                        <img src="{{ asset('assets/images/blog-details-thumb-2.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div> --}}
                            <div class="binduz-er-text mt-50">
                                <p>{!! $publicacion->contenido !!}</p>
                            </div>

                            {{-- <div class="binduz-er-text mt-50">
                                <p>When creating your app package, you can choose to create it manually or use App Studio,
                                    which is a useful app inside Teams that helps developers make Teams apps (yes, meta
                                    indeed stalled the App Studio app in you).</p>
                                <ul>
                                    <li>Once you have installed the App Studio app in your Teams client</li>
                                    <li>App Studio will guide you through</li>
                                    <li>Web services up and running, you’ll need to create an app package that can be
                                        distributed and installed</li>
                                </ul>
                            </div> --}}
                            {{-- <div class="row align-items-center pt-60">
                                <div class=" col-lg-3">
                                    <div class="binduz-er-blog-details-thumb">
                                        <img src="{{ asset('assets/images/blog-details-thumb-3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class=" col-lg-6">
                                    <div class="binduz-er-blog-details-thumb-text text pl-10 pr-25 pt-20 pb-20">
                                        <p>When creating your app package, you can choose to create it manually or use App
                                            Studio, which is a useful app inside Teams that helps developers make Teams
                                            apps.</p>
                                    </div>
                                </div>
                                <div class=" col-lg-3">
                                    <div class="binduz-er-blog-details-thumb">
                                        <img src="{{ asset('assets/images/blog-details-thumb-4.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="binduz-er-text pt-50">
                                <p>Structured gripped tape invisible moulded cups for sauppor firm hold strong powermesh
                                    front liner sport detail. Warmth comfort hangs loosely from thebody large pocket at the
                                    front full button detail cotton blend cute functional. Bodycon skirts bright primary
                                    colours punchy palette pleated cheerleader vibe stripe trims staple court shoe chunky
                                    mid block.</p>
                            </div> --}}
                            {{-- <div class="binduz-er-blog-details-thumb-play mt-50">
                                <img src="{{ asset('assets/images/blog-details-thumb-5.jpg') }}" alt="">
                                <div class="binduz-er-play">
                                    <a class="binduz-er-video-popup" href="#"><i class="fas fa-play"></i></a>
                                </div>
                            </div> --}}
                            {{-- <div class="binduz-er-text mt-50">
                                <p>A shortage of several hundred ventilators in New York City, the epicentre of the outbreak
                                    in the US, prompted Mr Cuomo to say that he will order the machines be taken from
                                    various parts of the state and give them to harder-hit areas. New York saw its highest
                                    single-day increase in deaths, up by 562 to 2,935 - nearly half of all virus-related US
                                    deaths recorded yesterday. The White House may advise those in virus hotspots to wear
                                    face coverings in public to help stem the spread.</p>
                            </div> --}}
                            {{-- <div
                                class="binduz-er-social-share-tag d-block d-sm-flex justify-content-between align-items-center">
                                <div class="binduz-er-tag">
                                    <ul>
                                        <li><a href="#">Popular</a></li>
                                        <li><a href="#">Desgin</a></li>
                                        <li><a href="#">UX</a></li>
                                    </ul>
                                </div>
                                <div class="binduz-er-social">
                                    <ul>
                                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-typo3"></i></a></li>
                                        <li><a href="#"><i class="fab fa-staylinked"></i></a></li>
                                        <li><a href="#"><i class="fab fa-tumblr"></i></a></li>
                                    </ul>
                                </div>
                            </div> --}}
                            {{-- <div class="binduz-er-blog-post-prev-next d-flex justify-content-between align-items-center">
                                <div class="binduz-er-post-prev-next">
                                    <a href="#">
                                        <span>Prev Post</span>
                                        <h4 class="binduz-er-title">Tips On Minimalist</h4>
                                    </a>
                                </div>
                                <div class="binduz-er-post-prev-next text-end">
                                    <a href="#">
                                        <span>Next Post</span>
                                        <h4 class="binduz-er-title">Less Is More</h4>
                                    </a>
                                </div>
                                <div class="binduz-er-post-bars">
                                    <a href="#"><img src="{{ asset('assets/images/icon/post-bars.png') }}"
                                            alt=""></a>
                                </div>
                            </div> --}}
                            <div class="binduz-er-blog-related-post">
                                <div class="binduz-er-related-post-title">
                                    <h3 class="binduz-er-title">Galeria</h3>
                                </div>
                                <div class="binduz-er-blog-related-post-slide">
                                    @foreach ($galeria as $imagen)
                                        <div class="binduz-er-video-post binduz-er-recently-viewed-item">
                                            <div class="binduz-er-latest-news-item">
                                                <div class="binduz-er-thumb">
                                                    <a href="{{ asset('storage/galeria/' . $imagen->imagen) }}"
                                                        target="_blank">
                                                        <img src="{{ asset('storage/galeria/' . $imagen->imagen) }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="binduz-er-content">
                                                    <div class="binduz-er-meta-item mt-0">
                                                        <div class="binduz-er-meta-date">
                                                            <span><i
                                                                    class="fal fa-calendar-alt"></i>{{ $imagen->fecha }}</span>
                                                        </div>
                                                    </div>
                                                    <h5 class="binduz-er-title mt-0"><a
                                                            href="#">{{ $imagen->titulo }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="binduz-er-blog-post-form">
                                <div class="binduz-er-blog-post-title">
                                    <h3 class="binduz-er-title">Comentarios</h3>
                                </div>
                                @include('mensaje')
                                <div class="row w-75 m-auto">
                                    @foreach ($comentarios as $item)
                                        <div class="col-6 col-md-4 col-lg-3 d-flex align-items-center wrapper">
                                            <img src="{{ asset('avatar.png') }}" width="15" alt="">
                                            <b class="text-dark">&nbsp;&nbsp;&nbsp;{{ $item->alias }}</b>
                                        </div>
                                        <div style="border:1px solid #d8d8d8;font-size:14px;border-radius:3px;"
                                            class="mt-3 col-6 col-md-8 col-lg-9 pt-3 px-4 pb-0">
                                            <p>
                                                @if ($item->estado == 1)
                                                    {!! $item->comentario !!}
                                                @else
                                                    <span class="text-danger">
                                                        <i class="fal fa-ban"></i>&nbsp; El comentario contiene
                                                        palabras inapropiadas y ha sido enviado para revisión.
                                                    </span>
                                                @endif
                                            </p>
                                            <span class="float-end me-0 text-primary" style="font-size:10px">
                                                {{ $item->creado_el }}
                                            </span>
                                        </div>
                                        <br><br>
                                    @endforeach
                                </div>
                                <br>
                                <form action="{{ route('comentario', $publicacion->id_contenido) }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="binduz-er-input-box">
                                                <input type="text" placeholder="Ingrese un alias o nombre" name="alias"
                                                    value="{{ old('alias') }}" class="input-focus">
                                                @error('alias')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            {{-- <div class="binduz-er-input-box">
                                                <input type="email" placeholder="Email address">
                                            </div> --}}
                                            {{-- <div class="binduz-er-input-box">
                                                <div class="binduz-er-input-box binduz-er-select-item">
                                                    <select>
                                                        <option data-display="Select Subject">Web Development</option>
                                                        <option value="1">Ui/Ux Designer</option>
                                                        <option value="2">Another option</option>
                                                        <option value="3">A disabled option</option>
                                                        <option value="4">Potato</option>
                                                    </select>
                                                    <i class="fal fa-arrow-down"></i>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class=" col-lg-6">
                                            <div class="binduz-er-input-box">
                                                <textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="Escriba su comentario"
                                                    class="input-focus">{{ old('comentario') }}</textarea>
                                                @error('comentario')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class=" col-lg-12">
                                            <div class="binduz-er-input-box text-end mt-15">
                                                <button type="submit" class="binduz-er-main-btn">Comentar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-3">
                    @include('components.aside')
                </div>
            </div>
        </div>
    </section>
@endsection
