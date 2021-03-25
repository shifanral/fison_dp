@extends('guest.master')
@section('title')
    Fison Digital Printing
@endsection
@section('content')
    <div class="jumbotron jumbotron-fluid animate__animated animate__fadeIn" style="margin-top: 60px;">
        <div class="container">
            <h5 class="display-1 animate__animated animate__slideInDown">Selamat Datang</h5>
            <p class="display-2 animate__animated animate__slideInDown">Di Fison Digital Printing</p>
        </div>
    </div>
@endsection
<style>
    /* Jumbotron */
    .jumbotron {
        background-image: url({{ asset('image/background.jpg') }});
        background-size: cover;
        background-position: center;
        display: block;
        height: 720px;
        width: 100%;
        margin-top: 0px;
        text-align: center;
        position: relative;
    }

    .jumbotron .container {
        position: relative;
        z-index: 1;
    }

    .jumbotron .display-1 {
        color: white;
        margin-top: 170px;
        font-size: 75px;
        font-weight: 200;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
        margin-bottom: 30px;
        font-family: "Comic Sans MS", cursive, sans-serif;
    }

    .jumbotron .display-2 {
        color: white;
        margin-top: 5px;
        font-size: 32px;
        font-weight: 200;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.7);
        margin-bottom: 5px;
        font-family: "Comic Sans MS", cursive, sans-serif;
    }
</style>