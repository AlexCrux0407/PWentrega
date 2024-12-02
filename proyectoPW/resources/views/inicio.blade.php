<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turista sin Mapas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #f8f9fa, #d9e2ec);
            font-family: "Poppins", sans-serif;
        }

        .hero {
            background-image: url('{{ asset("images/hero-banner.jpg") }}');
            background-size: cover;
            background-position: center;
            height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 0px 4px 10px rgba(0, 0, 0, 0.6);
            position: relative;
            margin-bottom: 2rem;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .hero-content {
            text-align: center;
            z-index: 2;
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            animation: fadeInDown 1s ease-in-out;
        }

        .hero p {
            font-size: 1.2rem;
            animation: fadeInUp 1.2s ease-in-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .promo-section {
            padding: 50px 0;
            background-color: #fff;
        }

        .promo-card {
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            padding: 10px;
        }

        .promo-card:hover {
            transform: scale(1.05);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        }

        .promo-card img {
            border-radius: 10px;
            height: 200px;
            object-fit: cover;
            margin: 0 auto;
            display: block;
        }

        .promo-card h5 {
            font-weight: bold;
            margin-top: 15px;
        }

        .promo-card p {
            color: #6c757d;
        }

        .cta {
            background-color: #161A30;
            color: white;
            padding: 50px 20px;
            text-align: center;
        }

        .cta h2 {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .cta button {
            background-color: #ff5a5f;
            border: none;
            padding: 15px 30px;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cta button:hover {
            background-color: #ff8083;
        }
    </style>
        @extends('layouts.plantilla')

</head>

<body>
    <div class="hero">
        <div class="hero-content">
            <h1>Explora el mundo con nosotros</h1>
            <p>Descubre los mejores destinos y promociones exclusivas</p>
        </div>
    </div>

    <div class="promo-section">
        <div class="container">
            <h2 class="text-center mb-5">Promociones destacadas</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="promo-card">
                        <img src="{{ asset('images/destinos/destino1.jpg') }}" class="img-fluid" alt="Buenos Aires">
                        <h5>Buenos Aires, Argentina</h5>
                        <p>Vuelos desde $4,552 MXN</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="promo-card">
                        <img src="{{ asset('images/destinos/destino2.jpg') }}" class="img-fluid" alt="Lima">
                        <h5>Lima, Perú</h5>
                        <p>Vuelos desde $3,299 MXN</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="promo-card">
                        <img src="{{ asset('images/destinos/destino3.jpg') }}" class="img-fluid" alt="Bogotá">
                        <h5>Bogotá, Colombia</h5>
                        <p>Vuelos desde $3,800 MXN</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cta">
        <h2>¿Listo para tu próxima aventura?</h2>
        <button onclick="window.location.href='/inicio'">Descubre más</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
