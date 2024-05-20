@extends('partials.templates.master')
@include('partials.header')
@include('partials.nav')


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{asset('pictures/aments_home_1_slider_1.webp')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-dark">
                <h5 class="fw-bold">Partes Nuevas para Autos</h5>
                <p>Some representative placeholder content for the first slide.</p>
                <button class="btn btn-danger">Comprar Ahora</button>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{asset('pictures/aments_home_1_slider_2.webp')}}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block text-dark">
                <h5 class="fw-bold">Partes Nuevas para Autos</h5>
                <p>Some representative placeholder content for the first slide.</p>
                <button class="btn btn-danger">Comprar Ahora</button>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<!--Categorias-->

<div class="container p-4 mt-4" id="category">
    <h2 class="fw-bold">Categorias</h2>
    <div class="d-flex justify-content-between mt-3">
        @foreach ($category as $c)
        <div class="card">
            <div class="card-header">
                {{$c->name}}
            </div>
            <div class="card-body">
                <a href="#" class="btn btn-primary">Ver mas</a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--Productos-->
<div class="container p-4 mt-4" id="products">
    <h2 class="fw-bold">Productos</h2>
    <div class="d-flex flex-wrap gap-4">
        @foreach ($product as $p )
        <div class="card" style="width: 18rem;">
            <img src="{{asset('pictures/'.$p->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <p class="card-text">{{$p->name}}</p>
                <button class="btn btn-danger view-more" data-name="{{ $p->name }}" data-description="{{ $p->description }}" data-price="{{ $p->price }}" data-image="{{ asset('pictures/'.$p->image) }}">
                    Ver más
                </button>
            </div>
        </div>
        @endforeach
    </div>

</div>

<footer class="footer mt-auto py-3" style="background-color: #000000;" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <div class="social-icons">
                    <a href="https://www.facebook.com" target="_blank">
                        <img src="{{asset('pictures/facebook.png')}}" alt="">
                    </a>
                    <a href="https://www.instagram.com/emmanuel_mtz777?igsh=OWZrYnlwc2FueTht" target="_blank">
                        <img src="{{asset('pictures/instagram.png')}}" alt="">
                    </a>
                    <a href="https://x.com/i/flow/login?redirect_after_login=%2Faneli_luz" target="_blank">
                        <img src="{{asset('pictures/twitter.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <form id="contactForm" data-url="{{ route('form_store') }}">
                    <div class="mb-3">
                        <label for="contactName" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="contactName" placeholder="Tu nombre">
                    </div>
                    <div class="mb-3">
                        <label for="contactEmail" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="contactEmail" placeholder="Tu correo electrónico">
                    </div>
                    <div class="mb-3">
                        <label for="contactMessage" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="contactMessage" rows="3" placeholder="Tu mensaje"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-custom">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</footer>

@include('partials._product')

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>