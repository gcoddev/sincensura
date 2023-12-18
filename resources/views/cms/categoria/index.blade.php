@extends('cms.wrapper')
@section('contenido_cms')
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Menu</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">CATEGORIAS DE NOTICIAS</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#nuevaCategoria">Nueva categoria</button>

                    <div class="modal fade" id="nuevaCategoria" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Categoria</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('post_categoria') }}">
                                    @csrf
                                    <input type="hidden" name="id_categoria" value="0" readonly>
                                    <div class="modal-body">
                                        <div class="form-group pb-3">
                                            <label for="nombre" class="form-label">Nombre de la Categoria <span
                                                    style="color:red;">*</span></label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="nombre"
                                                    placeholder="nombre" name="nombre" value="{{ old('nombre') }}">
                                                <span class="position-absolute top-50 translate-middle-y">
                                                    <i class="material-icons-outlined fs-5">title</i>
                                                </span>
                                            </div>
                                            @error('nombre')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group pb-3">
                                            <label for="descripcion" class="form-label">Descripcion</label>
                                            <div class="position-relative input-icon">
                                                <input type="text" class="form-control" id="descripcion"
                                                    placeholder="descripcion" name="descripcion"
                                                    value="{{ old('descripcion') }}">
                                                <span class="position-absolute top-50 translate-middle-y">
                                                    <i class="material-icons-outlined fs-5">description</i>
                                                </span>
                                            </div>
                                            @error('descripcion')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Categorias</h6>
        <hr>
        <div class="card">
            <div class="card-body">
                @include('cms.mensajes')
                @include('cms.errores')
                <br>
                <div class="table-responsive">
                    <table id="table-categoria" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Publicaciones</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $categoria->nombre }}</td>
                                    <td>{{ $categoria->descripcion }}</td>
                                    <td align="center">{{ count($categoria->publicaciones($categoria->id_categoria)) }}</td>
                                    <td>
                                        @if ($categoria->estado == 1)
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="cat-activo"
                                                    checked=""
                                                    onchange="cambiarEstado({{ $categoria->id_categoria }}, {{ $categoria->estado }}, 'inactiva')">
                                                {{-- &nbsp;<label class="form-check-label fw-bold text-success"
                                                    for="cat-activo">ACTIVO</label> --}}
                                            </div>
                                        @else
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="cat-inactivo"
                                                    onchange="cambiarEstado({{ $categoria->id_categoria }}, {{ $categoria->estado }}, 'activa')">
                                                {{-- &nbsp;<label class="form-check-label fw-bold text-danger"
                                                    for="cat-inactivo">INACTIVO</label> --}}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#editarCategoria_{{ $categoria->id_categoria }}">Editar</button>

                                        <div class="modal fade" id="editarCategoria_{{ $categoria->id_categoria }}"
                                            tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Categoria</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="{{ route('post_categoria') }}">
                                                        @csrf
                                                        <input type="hidden" value="{{ $categoria->id_categoria }}"
                                                            name="id_categoria" readonly>
                                                        <div class="modal-body">
                                                            <div class="form-group pb-3">
                                                                <label for="nombre" class="form-label">Nombre de la
                                                                    categoria <span style="color:red;">*</span></label>
                                                                <div class="position-relative input-icon">
                                                                    <input type="text" class="form-control"
                                                                        id="nombre" placeholder="nombre"
                                                                        name="nombre" value="{{ $categoria->nombre }}">
                                                                    <span
                                                                        class="position-absolute top-50 translate-middle-y">
                                                                        <i class="material-icons-outlined fs-5">title</i>
                                                                    </span>
                                                                </div>
                                                                @error('nombre')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group pb-3">
                                                                <label for="descripcion"
                                                                    class="form-label">Descripcion</label>
                                                                <div class="position-relative input-icon">
                                                                    <input type="text" class="form-control"
                                                                        id="descripcion" placeholder="descripcion"
                                                                        name="descripcion"
                                                                        value="{{ $categoria->descripcion }}">
                                                                    <span
                                                                        class="position-absolute top-50 translate-middle-y">
                                                                        <i
                                                                            class="material-icons-outlined fs-5">description</i>
                                                                    </span>
                                                                </div>
                                                                @error('descripcion')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                            <button type="submit"
                                                                class="btn btn-success">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @if (count($categoria->publicaciones($categoria->id_categoria)) == 0)
                                            <button class="btn btn-sm btn-danger"
                                                onclick="eliminar({{ $categoria->id_categoria }})">Eliminar</button>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function cambiarEstado(id_categoria, estado, accion) {
            Swal.fire({
                title: "Seguro que quiere cambiar la visibilidad de la categoria",
                text: "La visivilidad se hara " + accion,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Cambiar"
            }).then((result) => {
                if (result.isConfirmed) {
                    let token = '{{ csrf_token() }}'
                    let data = {
                        _token: token,
                        id_categoria: id_categoria,
                        estado: estado
                    }

                    $.ajax({
                        type: 'POST',
                        url: "{{ URL::route('cambiarEstadoC') }}",
                        data: data,
                        success: function() {
                            Swal.fire({
                                title: "Categoria actualizada",
                                text: "Visibilidad " + accion + 'da satisfactoriamente.',
                                icon: "success",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "Aceptar"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            });
        }

        function eliminar(id_categoria) {
            Swal.fire({
                title: "Seguro que quiere eliminar la categoria",
                text: "Esta accion es irreversible",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, Eliminar"
            }).then((result) => {
                if (result.isConfirmed) {
                    let token = '{{ csrf_token() }}'
                    let data = {
                        _token: token,
                        id_categoria: id_categoria
                    }

                    $.ajax({
                        type: 'POST',
                        url: "{{ URL::route('eliminarCategoria') }}",
                        data: data,
                        success: function() {
                            Swal.fire({
                                title: "Eliminado",
                                text: "La categoria a sido eliminada satisfactoriamente.",
                                icon: "success",
                                confirmButtonColor: "#3085d6",
                                confirmButtonText: "Aceptar"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            });
                        }
                    });
                }
            });
        }
    </script>
@endsection
