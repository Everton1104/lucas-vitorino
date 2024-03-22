@extends('layouts.app')

@section('title')
   - Início
@endsection

@section('content')
    <div class="container">
        <div class="text-center my-3">
            <span class="btn btn-outline-dark fs-3">AGENDE SEU CORTE</span>
        </div>
    </div>
    <div class="container">
        <div class="fs-1">
            GALERIA
        </div>
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
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
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
    </div>
    <div class="container">
        <div class="fs-1">
            Início
        </div>
        <p class="my-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam tempora ea, ullam doloribus ipsam ut ipsum error ratione adipisci debitis eveniet, expedita accusantium, quidem doloremque ad enim necessitatibus illum cum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam tempora ea, ullam doloribus ipsam ut ipsum error ratione adipisci debitis eveniet, expedita accusantium, quidem doloremque ad enim necessitatibus illum cum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam tempora ea, ullam doloribus ipsam ut ipsum error ratione adipisci debitis eveniet, expedita accusantium, quidem doloremque ad enim necessitatibus illum cum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam tempora ea, ullam doloribus ipsam ut ipsum error ratione adipisci debitis eveniet, expedita accusantium, quidem doloremque ad enim necessitatibus illum cum.

        </p>
    </div>
    <div class="container">
        <div class="fs-1">
            Início
        </div>
        <p class="my-5">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam tempora ea, ullam doloribus ipsam ut ipsum error ratione adipisci debitis eveniet, expedita accusantium, quidem doloremque ad enim necessitatibus illum cum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam tempora ea, ullam doloribus ipsam ut ipsum error ratione adipisci debitis eveniet, expedita accusantium, quidem doloremque ad enim necessitatibus illum cum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam tempora ea, ullam doloribus ipsam ut ipsum error ratione adipisci debitis eveniet, expedita accusantium, quidem doloremque ad enim necessitatibus illum cum.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam tempora ea, ullam doloribus ipsam ut ipsum error ratione adipisci debitis eveniet, expedita accusantium, quidem doloremque ad enim necessitatibus illum cum.

        </p>
    </div>
@endsection
