<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Reservaciones</title>
</head>
<body>
    <h1>Resumen de Reservaciones</h1>

    @if(session('reservations'))
    <div>
        <h2>Detalles de la Reservación</h2>
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
</body>
</html>
