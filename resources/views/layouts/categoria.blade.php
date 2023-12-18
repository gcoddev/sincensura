@extends('inicio')

@section('contenido_home')
    <div class="binduz-er-breadcrumb-area">
        <div class=" container">
            <div class="row">
                <div class=" col-lg-12">
                    <div class="binduz-er-breadcrumb-box">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('inicio') }}">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Categoria</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ strtoupper($categoria->nombre) }}
                                </li>
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
                    @if ($categoria->descripcion)
                        <hr>
                        <p class="p-5 text-center">{{ $categoria->descripcion }}</p>
                        <hr><br><br><br>
                    @endif
                    @foreach ($publicaciones as $item)
                        <div class="binduz-er-author-item mb-40">
                            <div class="binduz-er-thumb" style="max-width:500px;width;200px;margin:auto;">
                                <img src="{{ asset('storage/publicaciones/' . $item->imagen) }}" alt="">
                            </div>
                            <div class="binduz-er-content">
                                <div class="binduz-er-meta-item">
                                    <div class="binduz-er-meta-categories">
                                        <a href="#">{{ $item->categoria->nombre }}</a>
                                    </div>
                                    <div class="binduz-er-meta-date">
                                        <span><i class="fal fa-calendar-alt"></i>{{ $item->creado_el }}</span>
                                    </div>
                                </div>
                                <h3 class="binduz-er-title"><a
                                        href="{{ route('noticia', $item->id_contenido) }}">{{ $item->titulo }}</a></h3>
                                <div class="binduz-er-meta-author">
                                    <div class="binduz-er-author">
                                        <p>
                                            @if ($item->autor)
                                                <span>Por <span>{{ $item->autor }}</span></span>
                                            @endif
                                            <br>
                                            @if ($item->fuente)
                                                <span>Fuente <span>{{ $item->fuente }}</span></span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="binduz-er-meta-list">
                                        <ul>
                                            <li><i class="fal fa-eye"></i> {{ $item->vistas }}</li>
                                            <li><i class="fal fa-comments"></i>
                                                {{ count($item->comentario($item->id_contenido)) }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class=" col-lg-3">
                    @include('components.aside')
                </div>
            </div>
        </div>
    </section>
@endsection
