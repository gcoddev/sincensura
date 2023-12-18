<!doctype html>
<html lang="es" data-bs-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sin Censura Digital</title>
    <link rel="icon" href="{{ asset('logo.jpeg') }}" type="image/png">
    <link href="{{ asset('assets_cms/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_cms/assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_cms/assets/plugins/metismenu/mm-vertical.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets_cms/assets/plugins/simplebar/css/simplebar.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('assets_cms/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" />
    <link
        href="{{ asset('assets_cms/fonts.googleapis.com/css2ab59.css?family=Noto+Sans:wght@300;400;500;600&amp;display=swap') }}"
        rel="stylesheet">
    <link href="{{ asset('assets_cms/fonts.googleapis.com/cssf511.css?family=Material+Icons+Outlined') }}"
        rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('assets_cms/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/sass/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/sass/semi-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/sass/bordered-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/sass/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets_cms/richtext/richtext.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="wrapper">
        @yield('contenido')
        @yield('login')
    </div>

    <script src="{{ asset('assets_cms/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('assets_cms/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets_cms/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets_cms/assets/plugins/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets_cms/assets/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets_cms/assets/js/index.js') }}"></script>
    <script src="{{ asset('assets_cms/assets/plugins/peity/jquery.peity.min.js') }}"></script>

    <script src="{{ asset('assets_cms/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets_cms/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script>
        $(".data-attributes span").peity("donut")
    </script>
    <script>
        $(document).ready(function() {
            $('#table-categoria').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay ninguna categoria",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                // scrollX: true,
                aaSorting: []

            });
        });
        $(document).ready(function() {
            $('#table-contenido').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay publicaciones aun.",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ publicaciones.",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ publicaciones)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ publicaciones",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin publicaciones encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                // scrollX: true,
                aaSorting: []
            });
        });
        $(document).ready(function() {
            $('#table-galeria').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay imagenes aun.",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ imagenes.",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ imagenes)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ imagenes",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin imagenes encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                // scrollX: true,
                aaSorting: []
            });
        });
        $(document).ready(function() {
            $('#table-comentarios').DataTable({
                language: {
                    "decimal": "",
                    "emptyTable": "No hay comentarios aun.",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ comentarios.",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ comebtarios)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ comentarios",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin comentarios encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                // scrollX: true,
                aaSorting: []
            });
        });
    </script>
    <script src="{{ asset('assets_cms/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets_cms/assets/js/main.js') }}"></script>
    <script src="{{ asset('assets_cms/assets/js/sweetalert2.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
