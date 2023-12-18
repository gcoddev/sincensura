@extends('cms.wrapper')
@section('contenido_cms')
    <div class="main-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Menu</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Contenido</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#nuevaImagen">Nueva imagen</button>

                    <div class="modal fade" id="nuevaImagen" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Imagen</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" enctype="multipart/form-data" action="{{ route('post_imagen') }}">
                                    @csrf
                                    <div class="modal-body row">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group pb-3">
                                                <label for="titulo" class="form-label">Titulo de la imagen <span
                                                        style="color:red;">*</span></label>
                                                <div class="position-relative input-icon">
                                                    <input type="text" class="form-control" id="titulo"
                                                        placeholder="Titulo" name="titulo" value="{{ old('titulo') }}">
                                                    <span class="position-absolute top-50 translate-middle-y">
                                                        <i class="material-icons-outlined fs-5">title</i>
                                                    </span>
                                                </div>
                                                @error('titulo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group pb-3">
                                                <label for="fuente" class="form-label">Fuente de la imagen</label>
                                                <div class="position-relative input-icon">
                                                    <input type="text" class="form-control" id="fuente"
                                                        placeholder="fuente" name="fuente" value="{{ old('fuente') }}">
                                                    <span class="position-absolute top-50 translate-middle-y">
                                                        <i class="material-icons-outlined fs-5">link</i>
                                                    </span>
                                                </div>
                                                @error('fuente')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group pb-3">
                                                <label for="imagen" class="form-label">Imagen <span
                                                        style="color:red;">*</span></label>
                                                <div class="position-relative input-icon">
                                                    <input type="file" class="form-control ps-5"
                                                        accept="image/jpg,image/png,image/jpeg" id="imagen"
                                                        name="imagen" onchange="previewImage()">
                                                    <span class="position-absolute top-50 translate-middle-y">
                                                        <i class="material-icons-outlined fs-5">image</i>
                                                    </span>
                                                </div>
                                                @error('imagen')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <img src="{{ asset('placeholder.jpg') }}" class="w-100 h-100" alt=""
                                                id="preview_imagen">
                                        </div>
                                        <input type="hidden" name="id_contenido" value="{{ $publicacion->id_contenido }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Publicacion</h6>
        <hr>

        <div class="card">
            <div class="card-body">
                <br>
                <div class="row">
                    <div class="col-12 col-lg-6 row">
                        <div class="col-6">
                            <img src="{{ asset('storage/publicaciones/' . $publicacion->imagen) }}" class="w-100 h-100"
                                alt="">
                        </div>
                        <div class="col-6">
                            <p class="my-0"><b>Titulo: </b>{{ $publicacion->titulo }}</p>
                            <p class="my-0"><b>Descripcion: </b>{{ $publicacion->descripcion }}</p>
                            <p class="my-0"><b>Autor: </b>{{ $publicacion->autor }}</p>
                            <p class="my-0"><b>Fuente: </b>{{ $publicacion->fuente }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <p class="my-0">{!! $publicacion->contenido !!}</p>
                    </div>
                </div>
                <hr>
                @include('cms.mensajes')
                @include('cms.errores')
                <br>
                <center>
                    <h4>.:: Imagenes ::.</h4>
                </center>
                <div class="table-responsive">
                    <table id="table-galeria" class="table table-bordered table-striped w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Imagen</th>
                                <th>Fuente</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($galeria as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->titulo }}</td>
                                    <td align="center"><img src="{{ asset('storage/galeria/' . $item->imagen) }}"
                                            alt="imagen" width="150px"></td>
                                    <td>{{ $item->fuente ? $item->fuente : '-' }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-warning">Editar</button>
                                        <button class="btn btn-sm btn-danger" onclick="eliminar()">Eliminar</button>
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <br>
                <hr>
                <br>
                <center>
                    <h4>.:: Comentarios ::.</h4>
                </center>
                <div class="table-responsive">
                    <table id="table-comentarios" class="table table-bordered table-striped w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Alias</th>
                                <th>Comentario</th>
                                {{-- <th>Acciones</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($comentarios as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->alias }}</td>
                                    <td>{{ $item->comentario }}</td>
                                    {{-- <td>
                                        <button class="btn btn-sm btn-warning">Editar</button>
                                        <button class="btn btn-sm btn-danger" onclick="eliminar()">Eliminar</button>
                                    </td> --}}
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer py-3 px-5">
                <a href="{{ route('contenidos') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function eliminar() {
            Swal.fire({
                title: "Seguro que quiere eliminar la publicación",
                text: "Esta accion es irreversible",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Eliminado",
                        text: "La publicación a sido eliminada satisfactoriamente",
                        icon: "success"
                    });
                }
            });
        }

        function previewImage() {
            var reader = new FileReader();
            reader.readAsDataURL(document.getElementById('imagen').files[0]);
            reader.onload = function(e) {
                document.getElementById('preview_imagen').src = e.target.result;
            };
        }
    </script>
@endsection
