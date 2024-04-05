@extends('layouts.app')

@section('content')
    <style>
        .slideshow-container {
            max-width: 100%;
            position: relative;
            margin: auto;
        }

        .mySlides {
            display: none;
            max-width: 100%;
        }

        img {
            width: 100%;
            height: auto;
        }
    </style>

    <div class="container text-center">
        <h1 class="mb-4">Seja bem-vindo</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="slideshow-container">
                <div class="mySlides">
                    <img src="https://th.bing.com/th/id/OIP.BaeD-V1huT5SEUxBFI9jCgAAAA?rs=1&pid=ImgDetMain" alt="Guitarra" class="img-fluid">
                </div>

                <div class="mySlides">
                    <img src="https://i.ytimg.com/vi/4SNs8UwpX2o/maxresdefault.jpg" alt="Violão" class="img-fluid">
                </div>

                <div class="mySlides">
                    <img src="https://cdn.jornaldebrasilia.com.br/wp-content/uploads/2022/08/02132428/historias-o-show-do-seculo-scaled.jpeg" alt="Palco" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <script>
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {slideIndex = 1}
            slides[slideIndex-1].style.display = "block";
            setTimeout(showSlides, 10000); // Muda a imagem a cada 5 segundos
        }
    </script>
@endsection
