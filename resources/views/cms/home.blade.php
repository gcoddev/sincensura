@extends('cms.wrapper')

@section('contenido_cms')
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Inicio</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->


        <div class="row">
            <div class="col-12 col-xl-4 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <div class="">
                                <h2 class="mb-0">{{ count($visitas) }} total de vistas</h2>
                            </div>
                            <div class="">
                                <p
                                    class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-danger text-danger bg-opacity-10">
                                    <span class="material-icons-outlined fs-6">arrow_downward</span>8.6%
                                </p>
                            </div>
                        </div>
                        <p class="mb-0">Visitas a la pagina de Sin Censura Digital</p>
                        <div id="total_visitas"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-8 d-flex">
                <div class="card rounded-4 w-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around flex-wrap gap-4 p-4">
                            <div class="d-flex flex-column align-items-center justify-content-center gap-2">
                                <a href="javascript:;"
                                    class="mb-2 wh-48 bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="material-icons-outlined">person</i>
                                </a>
                                <h3 class="mb-0">{{ count($usuarios) }}</h3>
                                <p class="mb-0">Usuarios</p>
                            </div>
                            <div class="vr"></div>
                            <div class="d-flex flex-column align-items-center justify-content-center gap-2">
                                <a href="javascript:;"
                                    class="mb-2 wh-48 bg-success bg-opacity-10 text-success rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="material-icons-outlined">category</i>
                                </a>
                                <h3 class="mb-0">{{ count($categorias) }}</h3>
                                <p class="mb-0">Categorias</p>
                            </div>
                            <div class="vr"></div>
                            <div class="d-flex flex-column align-items-center justify-content-center gap-2">
                                <a href="javascript:;"
                                    class="mb-2 wh-48 bg-danger bg-opacity-10 text-danger rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="material-icons-outlined">description</i>
                                </a>
                                <h3 class="mb-0">{{ count($publicaciones) }}</h3>
                                <p class="mb-0">Publicaciones</p>
                            </div>
                            <div class="vr"></div>

                            <div class="d-flex flex-column align-items-center justify-content-center gap-2">
                                <a href="javascript:;"
                                    class="mb-2 wh-48 bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="material-icons-outlined">record_voice_over</i>
                                </a>
                                <h3 class="mb-0">{{ count($comentarios) }}</h3>
                                <p class="mb-0">Comentarios</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->

        <div class="row">
            <div class="col-12 col-xl-5 col-xxl-4 d-flex">
                <div class="card rounded-4 w-100 shadow-none bg-transparent border-0">
                    <div class="card-body p-0">
                        <div class="row g-4">
                            <div class="col-12 col-xl-6 d-flex">
                                <div class="card mb-0 rounded-4 w-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between mb-3">
                                            <div class="">
                                                <h4 class="mb-0">97.4K</h4>
                                                <p class="mb-0">Total Users</p>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:;"
                                                    class="dropdown-toggle-nocaret options dropdown-toggle"
                                                    data-bs-toggle="dropdown">
                                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="chart-container2">
                                            <div id="chart3"></div>
                                        </div>
                                        <div class="text-center">
                                            <p class="mb-0"><span class="text-success me-1">12.5%</span> from last month
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 d-flex">
                                <div class="card mb-0 rounded-4 w-100">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start justify-content-between mb-1">
                                            <div class="">
                                                <h4 class="mb-0">42.5K</h4>
                                                <p class="mb-0">Active Users</p>
                                            </div>
                                            <div class="dropdown">
                                                <a href="javascript:;"
                                                    class="dropdown-toggle-nocaret options dropdown-toggle"
                                                    data-bs-toggle="dropdown">
                                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                                    <li><a class="dropdown-item" href="javascript:;">Another action</a>
                                                    </li>
                                                    <li><a class="dropdown-item" href="javascript:;">Something else
                                                            here</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="chart-container2">
                                            <div id="chart2"></div>
                                        </div>
                                        <div class="text-center">
                                            <p class="mb-0">24K users increased from last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-xl-12">
                                <div class="card rounded-4 mb-0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center gap-3 mb-2">
                                            <div class="">
                                                <h2 class="mb-0">$65,129</h2>
                                            </div>
                                            <div class="">
                                                <p
                                                    class="dash-lable d-flex align-items-center gap-1 rounded mb-0 bg-success text-success bg-opacity-10">
                                                    <span class="material-icons-outlined fs-6">arrow_upward</span>8.6%
                                                </p>
                                            </div>
                                        </div>
                                        <p class="mb-0">Sales This Year</p>
                                        <div class="mt-4">
                                            <p class="mb-2 d-flex align-items-center justify-content-between">285 left to
                                                Goal<span class="">78%</span></p>
                                            <div class="progress w-100" style="height: 7px;">
                                                <div class="progress-bar bg-primary" style="width: 65%"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div><!--end row-->
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-7 col-xxl-8 d-flex">
                <div class="card w-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="">
                                <h5 class="mb-0 fw-bold">Sales & Views</h5>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle"
                                    data-bs-toggle="dropdown">
                                    <span class="material-icons-outlined fs-5">more_vert</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="chart4"></div>
                        <div
                            class="d-flex flex-column flex-lg-row align-items-start justify-content-around border p-3 rounded-4 mt-3 gap-3">
                            <div class="d-flex align-items-center gap-4">
                                <div class="">
                                    <p class="mb-0 data-attributes">
                                        <span
                                            data-peity='{ "fill": ["#0d6efd", "rgb(0 0 0 / 10%)"], "innerRadius": 32, "radius": 40 }'>5/7</span>
                                    </p>
                                </div>
                                <diiv class="">
                                    <p class="mb-1 fs-6 fw-bold">Monthly</p>
                                    <h2 class="mb-0">65,127</h2>
                                    <p class="mb-0"><span class="text-success me-2 fw-medium">16.5%</span><span>55.21
                                            USD</span></p>
                                </diiv>
                            </div>
                            <div class="vr"></div>
                            <div class="d-flex align-items-center gap-4">
                                <div class="">
                                    <p class="mb-0 data-attributes">
                                        <span
                                            data-peity='{ "fill": ["#6f42c1", "rgb(0 0 0 / 10%)"], "innerRadius": 32, "radius": 40 }'>5/7</span>
                                    </p>
                                </div>
                                <div class="">
                                    <p class="mb-1 fs-6 fw-bold">Yearly</p>
                                    <h2 class="mb-0">984,246</h2>
                                    <p class="mb-0"><span class="text-success me-2 fw-medium">24.9%</span><span>267.35
                                            USD</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            "use strict";
            var options = {
                series: [{
                    name: "Net Sales",
                    data: [4, 10, 25, 12, 25, 18, 40, 22, 7, 2, 0, 77]
                }],
                chart: {
                    //width:150,
                    height: 105,
                    type: 'area',
                    sparkline: {
                        enabled: !0
                    },
                    zoom: {
                        enabled: false
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 1.7,
                    curve: 'smooth'
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        gradientToColors: ['#02c27a'],
                        shadeIntensity: 1,
                        type: 'vertical',
                        opacityFrom: 0.5,
                        opacityTo: 0.0,
                        //stops: [0, 100, 100, 100]
                    },
                },

                colors: ["#02c27a"],
                tooltip: {
                    theme: "dark",
                    fixed: {
                        enabled: !1
                    },
                    x: {
                        show: !1
                    },
                    y: {
                        title: {
                            formatter: function(e) {
                                return ""
                            }
                        }
                    },
                    marker: {
                        show: !1
                    }
                },
                xaxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                }
            };

            var chart = new ApexCharts(document.querySelector("#total_visitas"), options);
            chart.render();
        })
    </script>
@endsection
