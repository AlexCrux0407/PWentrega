@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5">
    <h1 class="text-center">Resumen de Reservaciones</h1>
    <p class="text-center lead">Aquí puedes ver los detalles de tu reservación</p>

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if(session('reservations'))
                                        <h4 class="text-center">Detalles de tu Reservación</h4>
                                        <p><b>Hotel:</b> {{ session('reservations')['hotel']['nombre'] ?? 'No especificado' }}</p>
                                        <p><b>Ciudad:</b> {{ session('reservations')['hotel']['ciudad'] ?? 'No especificada' }}</p>
                                        <p><b>Categoría:</b> {{ session('reservations')['hotel']['categoria'] ?? 'No especificada' }}</p>
                                        <p><b>Fecha de Check-in:</b> {{ session('reservations')['check_in_date'] ?? 'No especificada' }}</p>
                                        <p><b>Fecha de Check-out:</b> {{ session('reservations')['check_out_date'] ?? 'No especificada' }}
                                        </p>
                                        <p><b>Precio por Noche:</b> ${{ session('reservations')['hotel_price'] ?? 0 }}</p>
                                        <p>
                                            <b>Total del Hotel:</b>
                                            @php
                                                $hotelPrice = session('reservations')['hotel_price'] ?? 0;
                                                $checkIn = strtotime(session('reservations')['check_in_date'] ?? 'now');
                                                $checkOut = strtotime(session('reservations')['check_out_date'] ?? 'now');
                                                $days = max(($checkOut - $checkIn) / 86400, 0);
                                            @endphp
                                            ${{ $hotelPrice * $days }}
                                        </p>
                                        <p><b>Vuelo:</b> {{ session('reservations')['vuelo']['destino'] ?? 'No especificado' }}</p>
                                        <p><b>Origen:</b> {{ session('reservations')['vuelo']['origen'] ?? 'No especificado' }}</p>
                                        <p><b>Fecha del Vuelo:</b> {{ session('reservations')['flight_date'] ?? 'No especificada' }}</p>
                                        <p><b>Precio del Vuelo:</b> ${{ session('reservations')['flight_price'] ?? 0 }}</p>
                                        <p><b>Total a Pagar:</b> ${{ session('reservations')['total'] ?? 0 }}</p>

                                        <!-- Botones -->
                                        <button class="btn"
                                            style="background-color: #1e2336; color: #ffffff; border: none; border-radius: 8px; padding: 10px 20px; width: 100%; margin: 10px 0; font-size: 16px;"
                                            onclick="location.href='{{ route('reservations.create') }}'">
                                            Crear Nueva Reservación
                                        </button>

                                        <button id="cancel-reservation" class="btn"
                                            style="background-color: #d9534f; color: #ffffff; border: none; border-radius: 8px; padding: 10px 20px; width: 100%; margin: 10px 0; font-size: 16px;">
                                            Cancelar Reservación
                                        </button>

                    @else
                        <p class="text-center">No hay reservaciones para mostrar.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('cancel-reservation')?.addEventListener('click', function () {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres cancelar tu reservación?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, cancelar',
            cancelButtonText: 'No, volver'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('reservations.cancel', ['id' => session('reservations')['id']]) }}";
            }
        });
    });
</script>
@endsection