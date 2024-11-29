@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Reservación de Servicios</h2>
    
    <!-- Sección de reservaciones -->
    <div class="card mb-4">
        <div class="card-header">Reservaciones Actuales</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Servicio</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí se listarían las reservaciones -->
                    @if ($reservations->isEmpty())
                    <p>No tienes reservaciones pendientes</p>
                    @else
                    <ul>
                        @foreach ($reservations as $reservation)
                        <li>
                            {{$reservations->description}}-${{number_format($reservation->price,2)}}
                        </li>
                        @endforeach
                    </ul>
                    
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Resumen y total -->
    <div class="card mb-4">
        <div class="card-header">Resumen de Pago</div>
        <div class="card-body">
            <h5>Total a Pagar: ${{ number_format($total, 2) }}</h5>
            <button class="btn btn-success" id="proceed-to-payment">Proceder al Pago</button>
        </div>
    </div>
    
    <!-- Políticas de cancelación -->
    <div class="alert alert-warning mt-4">
        <strong>Políticas:</strong> Las reservaciones pueden ser canceladas sin penalización hasta 48 horas antes de la fecha del servicio.
    </div>
    
    <!-- Reservaciones anteriores -->
    <div class="card">
        <div class="card-header">Mis Reservaciones</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Servicio</th>
                        <th>Fecha</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pastReservations as $pastReservation)
                        <tr>
                            <td>{{ $pastReservation->service_type }}</td>
                            <td>{{ $pastReservation->date }}</td>
                            <td>${{ number_format($pastReservation->price, 2) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No tienes reservaciones previas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.cancel-btn').forEach(button => {
            button.addEventListener('click', function () {
                const reservationId = this.getAttribute('data-id');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "Esta acción no se puede deshacer.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sí, cancelar',
                    cancelButtonText: 'No, mantener',
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch(/reservations/cancel/${reservationId}, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Cancelada', 'La reservación ha sido cancelada.', 'success')
                                    .then(() => location.reload());
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        });
                    }
                });
            });
        });
    });
</script>
@endsection