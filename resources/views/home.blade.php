@extends('layouts.app')

@section('title')
   - Início
@endsection

@section('content')
    <div class="container">
        <div class="text-center my-5">
            <span class="btn btn-outline-secondary fs-3" onclick="window.location.href='/agenda'">AGENDE SEU CORTE</span>
        </div>
    </div>
    <div id="carouselExampleAutoplaying" class="carousel slide vw-100" data-bs-ride="carousel">
        <div class="carousel-inner" style="height: 65vh">
            <div class="carousel-item active">
                <img src="storage/corte_1.jpeg" class="d-block w-100" alt="corte_1">
            </div>
            <div class="carousel-item">
                <img src="storage/corte_2.jpg" class="d-block w-100" alt="corte_2">
            </div>
            <div class="carousel-item">
                <img src="storage/corte_3.jpeg" class="d-block w-100" alt="corte_3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-4"></div>
            <img src="storage/tesoura-1.png" class="d-block img-fluid col-4" alt="tesoura_1">
            <div class="col-4"></div>
        <div class="fs-3 my-3">
            <p class="text-center fs-3">
                Estamos ansiosos para recebê-lo em nossa barbearia e proporcionar uma experiência de cuidados masculinos que você não encontrará em nenhum outro lugar.
                Marque seu horário hoje mesmo e descubra por que somos a escolha preferida dos homens que valorizam estilo, tradição e qualidade.
            </p>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <img src="storage/tesoura-2.png" class="d-block img-fluid col-4" alt="tesoura_2">
            <div class="col-4"></div>
        </div>
    </div>
@endsection
