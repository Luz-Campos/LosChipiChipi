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

  <!--Categorias-->

  <div class="container p-4 mt-4">
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
  <div class="container p-4 mt-4">
        <h2 class="fw-bold">Productos</h2>
        <div class="d-flex flex-wrap gap-4">
            @foreach ($product as $p )
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                    <p class="card-text">{{$p->name}}</p>
                    <a href="#" class="btn btn-danger">Ver mas</a>
                </div>
              </div>
            @endforeach
        </div>

  </div>
