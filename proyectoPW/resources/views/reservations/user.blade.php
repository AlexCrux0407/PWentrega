<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reservaciones</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>
<body>
    <h1>Mis Reservaciones</h1>

    @if($userReservations->isEmpty())
    <p>No tienes reservaciones.</p>
    @else
    <table border="1">
        <thead>
            <tr>
                <th>Hotel</th>
                <th>Ciudad</th>
                <th>Categoría</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Precio por Noche</th>
                <th>Total del Hotel</th>
                <th>Vuelo</th>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha del Vuelo</th>
                <th>Precio del Vuelo</th>
                <th>Total a Pagar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($userReservations as $reservation)
            <tr>
                <td>{{ $reservation->hotel_name }}</td>
                <td>{{ $reservation->hotel_city }}</td>
                <td>{{ $reservation->hotel_category }}</td>
                <td>{{ $reservation->check_in_date }}</td>
                <td>{{ $reservation->check_out_date }}</td>
                <td>${{ $reservation->hotel_price }}</td>
                <td>${{ $reservation->hotel_price * (strtotime($reservation->check_out_date) - strtotime($reservation->check_in_date)) / 86400 }}</td>
                <td>{{ $reservation->flight_name }}</td>
                <td>{{ $reservation->flight_origin }}</td>
                <td>{{ $reservation->flight_destination }}</td>
                <td>{{ $reservation->flight_date }}</td>
                <td>${{ $reservation->flight_price }}</td>
                <td>${{ $reservation->total }}</td>
                <td>
                    <button onclick="cancelReservation({{ $reservation->id }})">Cancelar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    function cancelReservation(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            html: "<b>Políticas de Cancelación:</b><br>" +
                  "<ul>" +
                  "<li><b>Cancelación Anticipada:</b> Puedes cancelar tu reservación sin cargos adicionales hasta 48 horas antes de la fecha de check-in del hotel o de la fecha de salida del vuelo. Después de este período, se aplicarán cargos por cancelación.</li>" +
                  "<li><b>Cargo por Cancelación:</b> Si cancelas dentro de las 48 horas anteriores a la fecha de check-in o de la fecha de salida del vuelo, se aplicará un cargo por cancelación equivalente al 50% del costo total de la reservación.</li>" +
                  "<li><b>No Show:</b> En caso de no presentarse (No Show) sin previa cancelación, se cobrará el 100% del costo total de la reservación.</li>" +
                  "<li><b>Reembolsos:</b> Los reembolsos se procesarán dentro de los 7 días hábiles siguientes a la solicitud de cancelación, y se realizarán a la misma forma de pago utilizada al hacer la reservación.</li>" +
                  "<li><b>Excepciones:</b> Las políticas de cancelación pueden variar para ciertas promociones y tarifas especiales. Por favor, revisa los términos y condiciones específicos de tu reservación.</li>" +
                  "</ul>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('reservations.cancel', ['id' => '']) }}" + id;
            }
        });
    }
    </script>
</body>
</html>
