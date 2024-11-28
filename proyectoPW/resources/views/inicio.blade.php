<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turista sin Mapas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .body {
            background-color: #B6BBC4;
            font-family: "Poppins", sans-serif;
        }

        .album {
            padding: 2rem 0;
        }

        .container {
            max-width: 1200px;
        }

        .card {
            background-color: #31304D;
            color: #F0ECE5;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card h4 {
            text-align: center;
            font-weight: 500;
        }

        .form-label {
            font-weight: bold;
        }

        .form-select,
        .form-control {
            border-radius: 5px;
            background-color: #F0ECE5;
            color: #31304D;
        }

        .form-select:focus,
        .form-control:focus {
            box-shadow: none;
            border-color: #B6BBC4;
        }

        .btn-primary {
            background-color: #161A30;
            color: #F0ECE5;
            border-radius: 5px;
            padding: 0.8rem;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #31304D;
        }

        .row-cols-1 .col {
            margin-bottom: 1.5rem;
        }

        .carousel-item img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            padding: 10px;
        }

        .carousel-caption h5 {
            color: #F0ECE5;
            font-size: 24px;
            font-weight: bold;
        }

        .carousel-caption p {
            color: #F0ECE5;
            font-size: 18px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
            
        }

        .carousel {
            margin: 50px auto;
            max-width: 800px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @extends('layouts.plantilla')

    <main>
        <section class="py-5 text-center container">
            <<div class="container">
        <h1 class="text-center my-5">Destinos populares</h1>
        <div id="destinosCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/destinos/destino1.jpg') }}" class="d-block w-100" alt="Buenos Aires">
                    <div class="carousel-caption">
                        <h5>Buenos Aires, Argentina</h5>
                        <p>Vuelos desde 4,552 $</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/destinos/destino2.jpg') }}" class="d-block w-100" alt="Lima">
                    <div class="carousel-caption">
                        <h5>Lima, Perú</h5>
                        <p>Vuelos desde 3,299 $</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/destinos/destino3.jpg') }}" class="d-block w-100" alt="Bogotá">
                    <div class="carousel-caption">
                        <h5>Bogotá, Colombia</h5>
                        <p>Vuelos desde 3,800 $</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#destinosCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#destinosCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        </section>



        <div class="album bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                    
                    <div class="col">
                        
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h4 class="text-center">Buscar un vuelo</h4>
                                <form action="{{ route('rutabuscarVuelo') }}" method="POST">
                                    @csrf
                                    <label for="origen" class="form-label">Origen</label>
                                    <select id="origen" name="origen" class="form-select" required>
                                        <option selected>Seleccione una ciudad</option>
                                        <option value="Buenos Aires">Buenos Aires</option>
                                        <option value="Bogotá">Bogotá</option>
                                        <option value="Lima">Lima</option>
                                        <option value="Ciudad de México">Ciudad de México</option>
                                        <option value="Santiago">Santiago</option>
                                        <option value="Montevideo">Montevideo</option>
                                        <option value="Caracas">Caracas</option>
                                        <option value="San Juan">San Juan</option>
                                        <option value="Quito">Quito</option>
                                        <option value="La Paz">La Paz</option>
                                    </select>

                                    <label for="destino" class="form-label">Destino</label>
                                    <select id="destino" name="destino" class="form-select" required>
                                        <option selected>Seleccione una ciudad</option>
                                        <option value="Madrid">Madrid</option>
                                        <option value="París">París</option>
                                        <option value="Nueva York">Nueva York</option>
                                        <option value="Tokio">Tokio</option>
                                        <option value="Sídney">Sídney</option>
                                        <option value="Londres">Londres</option>
                                        <option value="Roma">Roma</option>
                                        <option value="Toronto">Toronto</option>
                                        <option value="Dubái">Dubái</option>
                                        <option value="Bangkok">Bangkok</option>
                                    </select>

                                    <label for="fecha" class="form-label">Fecha de salida</label>
                                    <input type="date" id="fecha" name="fecha" class="form-control"
                                        min="{{ date('Y-m-d') }}" required>

                                    <label for="pasajeros" class="form-label">Número de pasajeros</label>
                                    <div class="d-flex">
                                        <input type="number" name="adultos" class="form-control me-2"
                                            placeholder="Adultos" min="1" required>
                                        <input type="number" name="niños" class="form-control me-2" placeholder="Niños"
                                            min="0">
                                        <input type="number" name="infantes" class="form-control" placeholder="Infantes"
                                            min="0">
                                    </div>

                                    <label for="clase" class="form-label">Clase</label>
                                    <select id="clase" name="clase" class="form-select" required>
                                        <option selected>Seleccione una clase</option>
                                        <option value="economica">Económica</option>
                                        <option value="ejecutiva">Ejecutiva</option>
                                        <option value="primera">Primera Clase</option>
                                    </select>

                                    <label for="aerolinea" class="form-label">Aerolínea (opcional)</label>
                                    <select id="aerolinea" name="aerolinea" class="form-select">
                                        <option selected>Cualquiera</option>
                                        <option value="Aeromexico">Aeroméxico</option>
                                        <option value="LATAM">LATAM</option>
                                        <option value="American Airlines">American Airlines</option>
                                        <option value="Iberia">Iberia</option>
                                        <option value="United Airlines">United Airlines</option>
                                    </select>

                                    <label for="precio_maximo" class="form-label">Precio máximo (opcional)</label>
                                    <input type="number" id="precio_maximo" name="precio_maximo" class="form-control"
                                        placeholder="Máximo en USD">

                                    <label for="escalas" class="form-label">Escalas</label>
                                    <select id="escalas" name="escalas" class="form-select">
                                        <option selected>Cualquiera</option>
                                        <option value="directo">Directo</option>
                                        <option value="1_escala">1 Escala</option>
                                        <option value="2_escalas">2 Escalas</option>
                                    </select>

                                    <label for="horario" class="form-label">Horario de salida (opcional)</label>
                                    <input type="time" id="horario" name="horario" class="form-control">

                                    <button type="submit" class="btn btn-primary w-100 mt-3">Buscar vuelo</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="text-center">Buscar un hotel</h4>
                            <form action="{{ route('rutabuscarHotel') }}" method="POST">
                                @csrf
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <select id="ciudad" name="ciudad" class="form-select">
                                <option selected>Seleccione una ciudad</option>
                                    <option value="Buenos Aires">Buenos Aires</option>
                                    <option value="Bogotá">Bogotá</option>
                                    <option value="Lima">Lima</option>
                                    <option value="Ciudad de México">Ciudad de México</option>
                                    <option value="Santiago">Santiago</option>
                                </select>

                                <label for="checkin" class="form-label">Fecha de check-in</label>
                                <input type="date" id="checkin" name="checkin" class="form-control"
                                    min="{{ date('Y-m-d') }}">

                                <label for="checkout" class="form-label">Fecha de check-out</label>
                                <input type="date" id="checkout" name="checkout" class="form-control"
                                    min="{{ date('Y-m-d') }}">

                                <label for="habitaciones" class="form-label">Número de habitaciones</label>
                                <input type="number" id="habitaciones" name="habitaciones" class="form-control" min="1"
                                    max="5" value="1">

                                <label for="adultos" class="form-label">Adultos</label>
                                <input type="number" id="adultos" name="adultos" class="form-control" min="1" max="10"
                                    value="1">

                                <label for="ninos" class="form-label">Niños</label>
                                <input type="number" id="ninos" name="ninos" class="form-control" min="0" max="5"
                                    value="0">

                                <label for="categoria" class="form-label">Categoría del hotel</label>
                                <select id="categoria" name="categoria" class="form-select">
                                    <option value="1">1 estrella</option>
                                    <option value="2">2 estrellas</option>
                                    <option value="3">3 estrellas</option>
                                    <option value="4">4 estrellas</option>
                                    <option value="5">5 estrellas</option>
                                </select>

                                <label for="precio_max" class="form-label">Precio máximo (opcional)</label>
                                <input type="number" id="precio_max" name="precio_max" class="form-control"
                                    placeholder="Máximo en USD">

                                <label for="distancia" class="form-label">Distancia al centro o punto turístico
                                    (opcional)</label>
                                <input type="number" id="distancia" name="distancia" class="form-control"
                                    placeholder="Máximo en km">

                                <label for="servicios" class="form-label">Servicios</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="wifi" name="servicios[]"
                                        value="wifi">
                                    <label class="form-check-label" for="wifi">Wi-Fi</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="piscina" name="servicios[]"
                                        value="piscina">
                                    <label class="form-check-label" for="piscina">Piscina</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="desayuno" name="servicios[]"
                                        value="desayuno">
                                    <label class="form-check-label" for="desayuno">Desayuno incluido</label>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mt-3">Buscar hotel</button>
                            </form>
                        </div>
                    </div>
                    </div>


                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="text-center">Consultar una reserva</h4>
                            <form action="{{ route('rutaConsultar') }}" method="POST">
                                @csrf
                                <label for="reserva" class="form-label">ID de la reserva</label>
                                <input type="text" id="reserva" name="reserva" class="form-control" maxlength="10"
                                    minlength="10" pattern="\d{10}" required
                                    placeholder="Ingrese los 10 dígitos de la reserva">
                                <button type="submit" class="btn btn-primary w-100 mt-3">Consultar reserva</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if(session('success_vuelo'))
        <script>
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('success_vuelo') }}",
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if(session('success_hotel'))
        <script>
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('success_hotel') }}",
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if(session('success_reserva'))
        <script>
            Swal.fire({
                title: '¡Éxito!',
                text: "{{ session('success_reserva') }}",
                icon: 'success',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if (session('errors_vuelo'))
        <script>
            Swal.fire({
                title: 'Errores de Validación en Vuelo',
                html: `<ul style="text-align: left;">@foreach (session('errors_vuelo')->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if (session('errors_hotel'))
        <script>
            Swal.fire({
                title: 'Errores de Validación en Hotel',
                html: `<ul style="text-align: left;">@foreach (session('errors_hotel')->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif

    @if (session('errors_reserva'))
        <script>
            Swal.fire({
                title: 'Errores de Validación en Reserva',
                html: `<ul style="text-align: left;">@foreach (session('errors_reserva')->all() as $error)<li>{{ $error }}</li>@endforeach</ul>`,
                icon: 'error',
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
</body>


</html>