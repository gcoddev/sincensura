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
                        <li class="breadcrumb-item active" aria-current="page">USUARIO</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('usuario') }}" class="btn btn-primary">Nuevo usuario</a>
                </div>
            </div>
        </div>
        <h6 class="mb-0 text-uppercase">Usuarios</h6>
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
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($usuarios as $user)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $user->nombres }}</td>
                                    <td>{{ $user->apellidos }}</td>
                                    <td>{{ $user->celular }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ strtoupper($user->rol->descripcion) }}</td>
                                    <td>
                                        @if ($user->id != 1)
                                            @if ($user->estado == 1)
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="cat-activo"
                                                        checked=""
                                                        onchange="cambiarEstado({{ $user->id }}, {{ $user->estado }}, 'inactiva')">
                                                    {{-- &nbsp;<label class="form-check-label fw-bold text-success"
                                                    for="cat-activo">ACTIVO</label> --}}
                                                </div>
                                            @else
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="cat-inactivo"
                                                        onchange="cambiarEstado({{ $user->id }}, {{ $user->estado }}, 'activa')">
                                                    {{-- &nbsp;<label class="form-check-label fw-bold text-danger"
                                                    for="cat-inactivo">INACTIVO</label> --}}
                                                </div>
                                            @endif
                                        @else
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="cat-activo"
                                                    checked="" disabled>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('usuario', $user->id) }}" class="btn btn-sm btn-warning">
                                            Editar
                                        </a>
                                        @if ($user->id != 1)
                                            <button class="btn btn-sm btn-danger"
                                                onclick="eliminar({{ $user->id }})">Eliminar</button>
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
        function eliminar(id) {
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
                        id: id
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

        function cambiarEstado(id, estado, accion) {
            Swal.fire({
                title: "Seguro que quiere inhabilitar al usuario",
                text: "El estado se hara " + accion,
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
                        id: id,
                        estado: estado
                    }

                    $.ajax({
                        type: 'POST',
                        url: "{{ URL::route('cambiarEstado') }}",
                        data: data,
                        success: function() {
                            Swal.fire({
                                title: "Actualizado",
                                text: "Estado " + accion + 'da satisfactoriamente.',
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
