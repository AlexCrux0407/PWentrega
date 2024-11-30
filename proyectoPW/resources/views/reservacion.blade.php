<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservación de Servicios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
</head>
<body>
    <h1>Reservación de Servicios</h1>

    <!-- Formulario de Reservaciones -->
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <h2>Reservación de Hotel</h2>
        <label for="hotel_name">Nombre del Hotel:</label>
        <input type="text" id="hotel_name" name="hotel_name" placeholder="Nombre del Hotel" required><br>
        <label for="check_in_date">Fecha de Check-in:</label>
        <input type="date" id="check_in_date" name="check_in_date" required><br>
        <label for="check_out_date">Fecha de Check-out:</label>
        <input type="date" id="check_out_date" name="check_out_date" required><br>
        <label for="hotel_price">Precio del Hotel:</label>
        <input type="number" id="hotel_price" name="hotel_price" placeholder="Precio del Hotel" required><br>

        <h2>Reservación de Vuelo</h2>
        <label for="flight_name">Nombre del Vuelo:</label>
        <input type="text" id="flight_name" name="flight_name" placeholder="Nombre del Vuelo" required><br>
        <label for="flight_date">Fecha del Vuelo:</label>
        <input type="date" id="flight_date" name="flight_date" required><br>
        <label for="flight_price">Precio del Vuelo:</label>
        <input type="number" id="flight_price" name="flight_price" placeholder="Precio del Vuelo" required><br>

        <button type="submit">Guardar Reservaciones</button>
    </form>

    <!-- Resumen de Reservaciones -->
    @if(session('reservations'))
    <div>
        <h2>Resumen de Reservaciones</h2>
        <p>Hotel: {{ session('reservations')['hotel_name'] }}</p>
        <p>Fecha de Check-in: {{ session('reservations')['check_in_date'] }}</p>
        <p>Fecha de Check-out: {{ session('reservations')['check_out_date'] }}</p>
        <p>Precio del Hotel: ${{ session('reservations')['hotel_price'] }}</p>
        <p>Vuelo: {{ session('reservations')['flight_name'] }}</p>
        <p>Fecha del Vuelo: {{ session('reservations')['flight_date'] }}</p>
        <p>Precio del Vuelo: ${{ session('reservations')['flight_price'] }}</p>
        <p>Total a Pagar: ${{ session('reservations')['total'] }}</p>
    </div>
    @else
    <p>No hay reservaciones para mostrar.</p>
    @endif

    <!-- Cancelación de Reservaciones -->
    <button id="cancel-reservation">Cancelar Reservación</button>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    document.getElementById('cancel-reservation').addEventListener('click', function() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Lógica para cancelar la reservación
                Swal.fire(
                    'Cancelado!',
                    'Tu reservación ha sido cancelada.',
                    'success'
                )
            }
        })
    });
    </script>
</body>
</html>
