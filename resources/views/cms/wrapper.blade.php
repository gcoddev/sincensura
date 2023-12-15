@extends('cms.index')
@section('contenido')
    @include('cms.components.header')
    <main class="main-wrapper">
        @yield('contenido_cms')
    </main>
    @include('cms.components.sidebar')
    @include('cms.components.footer')
@endsection
