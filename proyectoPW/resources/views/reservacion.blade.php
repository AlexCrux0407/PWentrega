@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5">
    <h1 class="text-center">Reservación de Servicios</h1>
    <p class="text-center lead">Selecciona un vuelo y un hotel, luego confirma tu reservación</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="text-center">Reservación de Servicios</h4>
                    <form action="{{ route('reservarServicio') }}" method="POST">
                        @csrf
                        <label for="vuelo" class="form-label">Seleccionar Vuelo</label>
                        <select id="vuelo" name="vuelo" class="form-select" required>
                            <option selected disabled>Seleccione un vuelo</option>
                            <option value="vuelo1" data-precio="300">Vuelo 1 - $300</option>
                            <option value="vuelo2" data-precio="450">Vuelo 2 - $450</option>
                        </select>

                        <label for="hotel" class="form-label">Seleccionar Hotel</label>
                        <select id="hotel" name="hotel" class="form-select" required>
                            <option selected disabled>Seleccione un hotel</option>
                            <option value="hotel1" data-precio="100">Hotel 1 - $100 por noche</option>
                            <option value="hotel2" data-precio="150">Hotel 2 - $150 por noche</option>
                        </select>

                        <label for="num_noches" class="form-label">Duración de la Estancia (Noches)</label>
                        <input type="number" id="num_noches" name="num_noches" class="form-control" min="1" required>

                        <label for="num_pasajeros" class="form-label">Número de Pasajeros</label>
                        <input type="number" id="num_pasajeros" name="num_pasajeros" class="form-control" min="1" required>

                        <button type="button" class="btn btn-primary w-100 mt-3" onclick="calcularTotal()">Calcular Total</button>
                        <p class="mt-3" id="totalPrecio">Total: $0</p>
                        <button type="submit" class="btn btn-success w-100">Confirmar Reservación</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function calcularTotal() {
        const vueloPrecio = parseFloat(document.querySelector('#vuelo option:checked').dataset.precio || 0);
        const hotelPrecio = parseFloat(document.querySelector('#hotel option:checked').dataset.precio || 0);
        const numNoches = parseInt(document.getElementById('num_noches').value || 0);
        const numPasajeros = parseInt(document.getElementById('num_pasajeros').value || 0);
        const total = (vueloPrecio * numPasajeros) + (hotelPrecio * numNoches);
        document.getElementById('totalPrecio').innerText = `Total: $${total}`;
    }
</script>

@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡Reservación Exitosa!',
            text: "{{ session('success') }}",
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif

@if($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Errores de Validación',
            html: `<ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                   </ul>`,
            confirmButtonText: 'Aceptar'
        });
    </script>
@endif
@endsection
