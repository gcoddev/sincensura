<aside class="sidebar-wrapper">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ asset('logo.jpeg') }}" class="logo-img" alt="">
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">SIN CENSURA</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav" data-simplebar="true">

        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{ route('admin') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                    </div>
                    <div class="menu-title">Inicio</div>
                </a>
            </li>
            <li class="menu-label">Menu</li>
            <li>
                <a href="{{ route('categoria') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i>
                    </div>
                    <div class="menu-title">Categorias</div>
                </a>
            </li>
            <li>
                <a href="{{ route('contenido') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">toc</i>
                    </div>
                    <div class="menu-title">Contenido</div>
                </a>
            </li>
            {{-- <li>
                <a class="has-arrow" href="javascript:;">
                    <div class="parent-icon"><i class="material-icons-outlined">api</i>
                    </div>
                    <div class="menu-title">Tables</div>
                </a>
                <ul>
                    <li><a href="table-basic-table.html"><i class="material-icons-outlined">arrow_right</i>Basic
                            Table</a>
                    </li>
                    <li><a href="table-datatable.html"><i class="material-icons-outlined">arrow_right</i>Data
                            Table</a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
    <div class="sidebar-bottom gap-4">
        <div class="dark-mode">
            <a href="javascript:;" class="footer-icon dark-mode-icon">
                <i class="material-icons-outlined">dark_mode</i>
            </a>
        </div>
    </div>
</aside>
