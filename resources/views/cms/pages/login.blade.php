<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sin censura | Login</title>
    <link rel="icon" href="{{ asset('assets_cms/assets/images/favicon-32x32.png') }}" type="image/png">

    <!--plugins-->
    <link href="{{ asset('assets_cms/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_cms/assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_cms/assets/plugins/metismenu/mm-vertical.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('assets_cms/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link
        href="{{ asset('assets_cms/fonts.googleapis.com/css2ab59.css?family=Noto+Sans:wght@300;400;500;600&amp;display=swap') }}"
        rel="stylesheet">
    <link href="{{ asset('assets_cms/fonts.googleapis.com/cssf511.css?family=Material+Icons+Outlined') }}"
        rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('assets_cms/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/sass/responsive.css') }}" rel="stylesheet">

</head>

<body class="bg-login">
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                <div class="card rounded-4">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('logo.jpeg') }}" class="mb-4" width="145" alt="">
                            {{-- <h3>Sin Censura</h3> --}}
                        </div>
                        <h4 class="fw-bold">ACCEDER</h4>
                        <p class="mb-0">Ingrese sus datos de usuario</p>

                        @include('cms.error')
                        @include('cms.mensajes')

                        <div class="form-body my-4">
                            <form class="row g-3" method="POST" action="{{ route('post_login') }}">
                                @csrf
                                <div class="col-12">
                                    <label for="username" class="form-label">Nombre de usuario:</label>
                                    <input type="text" class="form-control" id="username" placeholder="Username"
                                        name="username">
                                    @error('username')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="password" class="form-label">Contraseña:</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control border-end-0" id="password"
                                            value="" placeholder="Contraseña" name="password">
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class="bi bi-eye-slash-fill"></i></a>
                                    </div>
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end"> <a href="auth-basic-forgot-password.html">Forgot
                                        Password ?</a>
                                </div> --}}
                                <div class="col-12 mt-4">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                                    </div>
                                </div>
                                {{-- <div class="col-12">
                                    <div class="text-start">
                                        <p class="mb-0">Don't have an account yet? <a
                                                href="auth-basic-register.html">Sign up here</a>
                                        </p>
                                    </div>
                                </div> --}}
                            </form>
                        </div>

                        {{-- <div class="separator section-padding">
                            <div class="line"></div>
                            <p class="mb-0 fw-bold">OR</p>
                            <div class="line"></div>
                        </div>

                        <div class="d-flex gap-3 justify-content-center mt-4">
                            <a href="javascript:;"
                                class="wh-48 d-flex align-items-center justify-content-center rounded-circle border">
                                <img src="{{ asset('assets_cms/assets/images/apps/05.png') }}" width="30"
                                    alt="">
                            </a>
                            <a href="javascript:;"
                                class="wh-48 d-flex align-items-center justify-content-center rounded-circle border">
                                <img src="{{ asset('assets_cms/assets/images/apps/17.png') }}" width="30"
                                    alt="">
                            </a>
                            <a href="javascript:;"
                                class="wh-48 d-flex align-items-center justify-content-center rounded-circle border">
                                <img src="{{ asset('assets_cms/assets/images/apps/18.png') }}" width="30"
                                    alt="">
                            </a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets_cms/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_cms/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>

</body>

</html>
