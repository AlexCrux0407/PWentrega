@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5">
    <h1 class="text-center">Buscar Hotel</h1>
    <p class="text-center lead">Encuentra el mejor hotel para tu estadía</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center">Buscar un hotel</h4>
                    <form action="{{ route('rutabuscarHotel') }}" method="POST">
                        @csrf
                        <label for="ciudad" class="form-label">Ciudad</label>
                        <select id="ciudad" name="ciudad" class="form-select" required>
                            <option selected disabled>Seleccione una ciudad</option>
                            <option value="Lima">Lima</option>
                            <option value="Bogotá">Bogotá</option>
                            <option value="Ciudad de México">Ciudad de México</option>
                            <option value="Buenos Aires">Buenos Aires</option>
                            <option value="Santiago">Santiago</option>
                        </select>

                        <label for="checkin" class="form-label">Fecha de Check-in</label>
                        <input type="date" id="checkin" name="checkin" class="form-control" required>

                        <label for="checkout" class="form-label">Fecha de Check-out</label>
                        <input type="date" id="checkout" name="checkout" class="form-control" required>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Buscar Hotel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@if(session('success_hotel'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: "{{ session('success_hotel') }}",
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@if (session('errors_hotel'))
    <script>
        Swal.fire({
            title: 'Errores de Validación',
            html: `
                <ul style="text-align: left;">
                    @foreach (session('errors_hotel')->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            icon: 'error',
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@endsection



