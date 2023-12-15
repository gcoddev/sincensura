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
                            @foreach ($contenido as $item)
                                <tr>
                                    <td>{{ $item->id_contenido }}</td>
                                    <td>{{ $item->titulo }}</td>
                                    <td align="center"><img src="{{ asset('storage/publicaciones/' . $item->imagen) }}"
                                        alt="imagen" width="150px"></td>
                                        <td>{{ $item->descripcion ? $item->descripcion : '-' }}</td>
                                        <td>{{ $item->categoria->nombre }}</td>
                                        <td>{{ $item->autor ? $item->autor : '-' }}</td>
                                        <td>{{ $item->fuente ? $item->fuente : '-' }}</td>
                                        <td>
                                            @if ($item->estado == 1)
                                            <span class="badge bg-success">ACTIVO</span>
                                        @else
                                            <span class="badge bg-danger">INACTIVO</span>
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-primary">Ver</button>
                                        <button class="btn btn-sm btn-warning">Editar</button>
                                        <button class="btn btn-sm btn-danger" onclick="eliminar()">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

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
</script>
