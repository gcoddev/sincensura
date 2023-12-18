<footer class="binduz-er-footer-area-4">
    <div class=" container">
        <div class="row">
            <div class=" col-lg-12">
                <div class="row">
                    <div class=" col-lg-3">
                        <div class="binduz-er-footer-about binduz-er-footer-about-4">
                            <div class="binduz-er-logo">
                                <a href="#"><img src="{{ asset('logo.jpeg') }}" alt=""></a>
                            </div>
                            <p>Sin censura Digital</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class=" col-lg-5">
                        <div class="binduz-er-footer-gallery ml-50">
                            <div class="binduz-er-footer-title">
                                <h4 class="binduz-er-title">Imagenes recientes</h4>
                            </div>
                            <div class="binduz-er-footer-gallery-widget row">
                                @foreach ($imagenes as $img)
                                    <div class="col-3 binduz-er-item">
                                        <a href="{{ route('noticia', $img->id_contenido) }}" class="w-100 h-100">
                                            <img src="{{ asset('storage/galeria/' . $img->imagen) }}" alt="" class="w-100 h-100">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-4">
                        <div class="binduz-er-footer-navigation binduz-er-footer-navigation-4">
                            <div class="binduz-er-footer-title">
                                <h3 class="binduz-er-title">Información</h3>
                            </div>
                            <div class="binduz-er-footer-list">
                                <ul>
                                    <li><a href="#">Sobre nosotros</a></li>
                                    <li><a href="#">Contactanos</a></li>
                                </ul>
                                <ul>
                                    @foreach ($categorias as $item)
                                        <li><a href="#">{{ $item->nombre }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="binduz-er-footer-copyright-area binduz-er-footer-copyright-area-4">
    <div class=" container">
        <div class="row align-items-center">
            <div class=" col-lg-6">
                <div class="binduz-er-copyright-text">
                    <p>Copyright by <span>gary</span> - 2023</p>
                </div>
            </div>
            <div class=" col-lg-6">
                <div class="binduz-er-copyright-menu float-lg-end float-none">
                    <ul>
                        <li><a href="#">Reportar</a></li>
                        <li><a href="#">Terminos y condiciones</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
