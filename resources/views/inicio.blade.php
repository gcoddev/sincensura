<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Sin Censura Digital</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('logo.jpeg') }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!--====== nice select css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">


</head>

<body class="gray-bg bg-2">
    @include('components.header')

    @include('components.contenido')

    @include('components.footer')

    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>

    <!--====== Slick js ======-->
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>

    <!--====== nice select js ======-->
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>

    <!--====== Isotope js ======-->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>

    <!--====== Images Loaded js ======-->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

    <!--====== Main js ======-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        function actualizarHora() {
            const fecha = new Date();
            const horas = fecha.getHours().toString().padStart(2, '0');
            const minutos = fecha.getMinutes().toString().padStart(2, '0');
            const segundos = fecha.getSeconds().toString().padStart(2, '0');

            const horaActual = `${horas}:${minutos}:${segundos}`;

            // Actualizar el contenido del elemento con la hora actual
            document.getElementById('hora-actual').innerText = horaActual;
        }

        // Llamar a la función inicialmente para mostrar la hora al cargar la página
        actualizarHora();

        // Actualizar la hora cada segundo (1000 milisegundos)
        setInterval(actualizarHora, 1000);

        function obtenerClima() {
            // Reemplaza 'TU_CLAVE_DE_API' con tu clave de API de OpenWeatherMap
            const apiKey = 'acfbd75269e87eac85d37a35ef55d6a2';
            const ciudad = 'La Paz, BO';
            const unidad = 'metric'; // 'metric' para Celsius, 'imperial' para Fahrenheit
            const idioma = 'es'; // 'es' para español

            const apiUrl =
                `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&units=${unidad}&lang=${idioma}&appid=${apiKey}`;

            // Realizar la solicitud a la API
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    // Obtener la información del clima
                    const temperatura = data.main.temp;
                    const descripcion = data.weather[0].description;

                    // Formatear la información y actualizar el contenido del elemento
                    const climaActual = `${temperatura}°C - ${descripcion}`;
                    document.getElementById('clima-actual').innerText = climaActual;
                })
                .catch(error => {
                    console.error('Error al obtener el clima:', error);
                });
        }

        // Llamar a la función inicialmente para mostrar el clima al cargar la página
        obtenerClima();

        // Actualizar el clima cada 5 minutos (300,000 milisegundos)
        setInterval(obtenerClima, 300000);
    </script>
</body>

</html>
