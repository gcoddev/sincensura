@extends('cms.wrapper')
@section('contenido_cms')
    <div class="main-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Administración</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">USUARIOS</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="col-12">
            <div class="card">
                <div class="card-body p-4">
                    <h5 class="mb-4">Nuevo usuario</h5>
                    <form class="row g-3" action="{{ route('post_usuario') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ isset($user->id) ? $user->id : 0 }}" readonly>
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="form-group pb-3">
                                    <label for="nombres" class="form-label">Nombres <span
                                            style="color:red;">*</span></label>
                                    <div class="position-relative input-icon">
                                        <input type="text" class="form-control" id="nombres" placeholder="Nombres"
                                            name="nombres"
                                            value="{{ isset($user->nombres) ? $user->nombres : old('nombres') }}">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">person</i>
                                        </span>
                                    </div>
                                    @error('nombres')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="apellidos" class="form-label">Apellidos <span
                                            style="color:red;">*</span></label>
                                    <div class="position-relative input-icon">
                                        <input type="text" class="form-control" id="apellidos" placeholder="Apellidos"
                                            name="apellidos"
                                            value="{{ isset($user->apellidos) ? $user->apellidos : old('apellidos') }}">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">group</i>
                                        </span>
                                    </div>
                                    @error('apellidos')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="celular" class="form-label">Celular </label>
                                    <div class="position-relative input-icon">
                                        <input type="text" class="form-control" id="celular" placeholder="Celular"
                                            name="celular"
                                            value="{{ isset($user->celular) ? $user->celular : old('celular') }}">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">call</i>
                                        </span>
                                    </div>
                                    @error('celular')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="email" class="form-label">Email </label>
                                    <div class="position-relative input-icon">
                                        <input type="text" class="form-control" id="email" placeholder="Email"
                                            name="email" value="{{ isset($user->email) ? $user->email : old('email') }}">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">mail</i>
                                        </span>
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="username" class="form-label">Nombre de usuario <span
                                            style="color:red;">*</span></label>
                                    <div class="position-relative input-icon">
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Nombre de usuario" name="username"
                                            value="{{ isset($user->username) ? $user->username : old('username') }}">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">account_circle</i>
                                        </span>
                                    </div>
                                    @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="id_rol" class="form-label">Rol de usuario <span
                                            style="color:red;">*</span></label>
                                    <div class="position-relative input-icon">
                                        <select id="id_rol" class="form-select ps-5" name="id_rol">
                                            <option value="">[ Seleccionar categoria ]</option>
                                            @foreach ($roles as $rol)
                                                <option value="{{ $rol->id_rol }}"
                                                    {{ isset($user->id_rol) ? ($user->id_rol == $rol->id_rol ? 'selected' : '') : (old('id_rol') == $rol->id_rol ? 'selected' : '') }}>
                                                    {{ $rol->descripcion }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">supervisor_account</i>
                                        </span>
                                    </div>
                                    @error('id_rol')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="password" class="form-label">Contraseña @if ($id == 0)
                                            <span style="color:red;">*</span>
                                        @endif
                                    </label>
                                    <div class="position-relative input-icon">
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Contraseña" name="password">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">password</i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group pb-3">
                                    <label for="confirmar_password" class="form-label">Confirmar contraseña @if ($id == 0)
                                            <span style="color:red;">*</span>
                                        @endif
                                    </label>
                                    <div class="position-relative input-icon">
                                        <input type="password" class="form-control" id="confirmar_password"
                                            placeholder="Confirmar contraseña" name="confirmar_password">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">password</i>
                                        </span>
                                    </div>
                                    @error('confirmar_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group pb-3">
                                    <label for="imagen" class="form-label">Imagen de la noticia <span
                                            style="color:red;">*</span></label>
                                    <div class="position-relative input-icon">
                                        <input type="file" class="form-control ps-5"
                                            accept="image/jpg,image/png,image/jpeg" id="imagen" name="imagen"
                                            onchange="previewImage()">
                                        <span class="position-absolute top-50 translate-middle-y">
                                            <i class="material-icons-outlined fs-5">image</i>
                                        </span>
                                    </div>
                                    @error('imagen')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                            </div>
                            <div class="col-12 col-lg-6 d-flex justify-content-center">
                                <img src="{{ isset($user->imagen) ? asset('storage/publicaciones/' . $user->imagen) : asset('placeholder.jpg') }}"
                                    class="w-100 h-100" alt="" id="preview_imagen">
                            </div>
                        </div>
                        <div class="col-12 form-group pb-3">
                            <div class="d-md-flex d-grid align-items-center gap-3">
                                <button type="submit" class="btn btn-success px-4">Guardar</button>
                                <button type="reset" class="btn btn-light px-4">Restablecer</button>
                                <a href="{{ route('usuarios') }}" class="btn btn-secondary px-4">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- <script src="{{ asset('assets_cms/richtext/jquery.richtext.min.js') }}"></script> --}}
    <script>
        function previewImage() {
            var reader = new FileReader();
            reader.readAsDataURL(document.getElementById('imagen').files[0]);
            reader.onload = function(e) {
                document.getElementById('preview_imagen').src = e.target.result;
            };
        }
    </script>
@endsection
