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
                        <li class="breadcrumb-item active" aria-current="page">PUBLICACIONES DE NOTICIAS</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('publicacion') }}" class="btn btn-primary">Nueva publicación</a>
                </div>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Publicaciones</h6>
        <hr>

        <div class="card">
            <div class="card-body">
                @include('cms.mensajes')
                <br>
                <div class="table-responsive">
                    <table id="table-contenido" class="table table-bordered table-striped w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Titulo</th>
                                <th>Imagen</th>
                                <th>Descripcion</th>
                                <th>Categoria</th>
                                <th>Autor</th>
                                <th>Fuente</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($contenido as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->titulo }}</td>
                                    <td align="center"><img src="{{ asset('storage/publicaciones/' . $item->imagen) }}"
                                            alt="imagen" width="150px"></td>
                                    <td>{{ $item->descripcion ? $item->descripcion : '-' }}</td>
                                    <td>{{ $item->categoria->nombre }}</td>
                                    <td>{{ $item->autor ? $item->autor : '-' }}</td>
                                    <td>{{ $item->fuente ? $item->fuente : '-' }}</td>
                                    <td>
                                        @if ($item->estado == 1)
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="cat-activo"
                                                    checked=""
                                                    onchange="cambiarEstado({{ $item->id_contenido }}, {{ $item->estado }}, 'inactiva')">
                                                {{-- &nbsp;<label class="form-check-label fw-bold text-success"
                                                    for="cat-activo">ACTIVO</label> --}}
                                            </div>
                                        @else
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="cat-inactivo"
                                                    onchange="cambiarEstado({{ $item->id_contenido }}, {{ $item->estado }}, 'activa')">
                                                {{-- &nbsp;<label class="form-check-label fw-bold text-danger"
                                                    for="cat-inactivo">INACTIVO</label> --}}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('contenidoOne', $item->id_contenido) }}"
                                            class="btn btn-sm btn-primary">
                                            Ver
                                        </a>
                                        <a href="{{ url('admin/publicacion', $item->id_contenido) }}"
                                            class="btn btn-sm btn-warning">
                                            Editar
                                        </a>
                                        <button class="btn btn-sm btn-danger"
                                            onclick="eliminar({{ $item->id_contenido }})">Eliminar</button>
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
        function eliminar(id_contenido) {
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
                    let token = '{{ csrf_token() }}'
                    let data = {
                        _token: token,
                        id_contenido: id_contenido
                    }

                    $.ajax({
                        type: 'POST',
                        url: "{{ URL::route('eliminarPublicacion') }}",
                        data: data,
                        success: function() {
                            Swal.fire({
                                title: "Eliminado",
                                text: "La publicación a sido eliminada satisfactoriamente.",
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

        function cambiarEstado(id_contenido, estado, accion) {
            Swal.fire({
                title: "Seguro que quiere cambiar la visibilidad de la publicación",
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
                        id_contenido: id_contenido,
                        estado: estado
                    }

                    $.ajax({
                        type: 'POST',
                        url: "{{ URL::route('cambiarEstado') }}",
                        data: data,
                        success: function() {
                            Swal.fire({
                                title: "Actualizado",
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
    </script>
@endsection
