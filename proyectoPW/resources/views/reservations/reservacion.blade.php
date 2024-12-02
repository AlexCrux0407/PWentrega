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
                                        <button class="btn" id="show-terms-button"
                                            style="background-color: #007bff; color: #ffffff; border: none; border-radius: 8px; padding: 10px 20px; width: 100%; margin: 10px 0; font-size: 16px;">
                                            Ver Términos y Condiciones
                                        </button>
                                        <button id="cancel-reservation" class="btn"
                                            style="background-color: #d9534f; color: #ffffff; border: none; border-radius: 8px; padding: 10px 20px; width: 100%; margin: 10px 0; font-size: 16px;">
                                            Cancelar Reservación
                                        </button>

                    @else
                        <p class="text-center">No hay reservaciones para mostrar.</p>
                    @endif
                    <!-- Modal para los términos y condiciones -->
                    <div class="modal fade" id="termsModal" tabindex="-1" role="dialog"
                        aria-labelledby="termsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        {{ $terms_and_conditions->titulo ?? 'Términos y Condiciones' }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! $termsAndConditions->contenido ?? 'No hay términos y condiciones disponibles.' !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('show-terms-button')?.addEventListener('click', function () {
        var myModal = new bootstrap.Modal(document.getElementById('termsModal'));
        myModal.show();
    });
</script>


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