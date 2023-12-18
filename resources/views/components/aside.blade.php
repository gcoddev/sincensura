<div class="binduz-er-video-post-sidebar">
    <div class="binduz-er-social-box">
        <div class="binduz-er-social-title">
            <h4 class="binduz-er-title">Social Connects</h4>
        </div>
        <div class="binduz-er-social-list">
            <ul>
                <li><a href="#"><i class="fab fa-facebook-f"></i> <span>15000</span> Likes</a>
                </li>
                <li><a href="#"><i class="fab fa-twitter"></i> <span>15000</span> Likes</a></li>
                <li><a href="#"><i class="fab fa-behance"></i> <span>5k+</span> Follower</a>
                </li>
                <li><a href="#"><i class="fab fa-youtube"></i> <span>1M+</span> Subscriber</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="binduz-er-populer-news-sidebar-post pt-30 binduz-er-most-populer-post-box">
        <div class="binduz-er-popular-news-title">
            <ul class="nav nav-pills mb-3" id="pills-tab-2" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pubs-populares-tab" data-bs-toggle="pill" href="#pubs-populares"
                        role="tab" aria-controls="pubs-populares" aria-selected="true">Mas popular </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pubs-recientes-tab" data-bs-toggle="pill" href="#pubs-recientes"
                        role="tab" aria-controls="pubs-recientes" aria-selected="false">Mas reciente </a>
                </li>
            </ul>
        </div>
        <div class="tab-content" id="pills-tabContent-3">
            <div class="tab-pane fade show active" id="pubs-populares" role="tabpanel"
                aria-labelledby="pubs-populares-tab">
                <div class="binduz-er-sidebar-latest-post-box">
                    @foreach ($publicacionesPopulares as $pub)
                        <div class="binduz-er-sidebar-latest-post-item">
                            <div class="binduz-er-thumb">
                                <img src="{{ asset('storage/publicaciones/' . $pub->imagen) }}" alt="latest"
                                    width="160" height="160" style="object-fit:cover;object-position:top">
                            </div>
                            <div class="binduz-er-content">
                                <span><i class="fal fa-calendar-alt"></i> {{ $pub->creado_el }}</span>
                                <h4 class="binduz-er-title"><a
                                        href="{{ route('noticia', $pub->id_contenido) }}">{{ strtoupper($pub->titulo) }}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="pubs-recientes" role="tabpanel" aria-labelledby="pubs-recientes-tab">
                <div class="binduz-er-sidebar-latest-post-box">
                    @foreach ($publicacionesNews as $pub)
                        <div class="binduz-er-sidebar-latest-post-item">
                            <div class="binduz-er-thumb">
                                <img src="{{ asset('storage/publicaciones/' . $pub->imagen) }}" alt="latest"
                                    width="160" height="160" style="object-fit:cover;object-position:top">
                            </div>
                            <div class="binduz-er-content">
                                <span><i class="fal fa-calendar-alt"></i> {{ $pub->creado_el }}</span>
                                <h4 class="binduz-er-title"><a
                                        href="{{ route('noticia', $pub->id_contenido) }}">{{ strtoupper($pub->titulo) }}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="binduz-er-populer-news-sidebar-newsletter mt-40">
        <div class="binduz-er-newsletter-box text-center">
            <h3 class="binduz-er-title">Enterate las ultimas noticias</h3>
            <p>No le enviaremos spam</p>
            <div class="binduz-er-input-box">
                <input type="text" placeholder="Ingrese su email">
                <button><i class="fal fa-long-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
