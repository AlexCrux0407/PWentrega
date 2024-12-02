<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reservación</title>
    <link rel="stylesheet" href="{{ asset('css/crearreserva.css') }}">
</head>
<body>
    <h1>Crear Reservación</h1>
    <form action="{{ route('reservations.store') }}" method="POST" id="reservation-form">
        @csrf

        <!-- Selección de Hotel -->
        <label for="hotel_id">Hotel:</label>
        <select name="hotel_id" id="hotel_id" required>
            <option value="" disabled selected>Selecciona un hotel</option>
            @foreach($hoteles as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->nombre }}</option>
            @endforeach
        </select>

        <!-- Selección de Vuelo -->
        <label for="vuelo_id">Vuelo:</label>
        <select name="vuelo_id" id="vuelo_id" required>
            <option value="" disabled selected>Selecciona un vuelo</option>
            @foreach($vuelos as $vuelo)
                <option value="{{ $vuelo->id }}">{{ $vuelo->destino }} ({{ $vuelo->origen }})</option>
            @endforeach
        </select>

        <!-- Fechas -->
        <label for="check_in_date">Fecha de Check-in:</label>
        <input type="date" name="check_in_date" id="check_in_date" required>

        <label for="check_out_date">Fecha de Check-out:</label>
        <input type="date" name="check_out_date" id="check_out_date" required>

        <label for="flight_date">Fecha del Vuelo:</label>
        <input type="date" id="flight_date" name="flight_date" required>

        <button type="submit">Crear Reservación</button>
    </form>

    <script>
        document.getElementById('reservation-form').addEventListener('submit', function(event) {
            const flightDate = new Date(document.getElementById('flight_date').value);
            const checkInDate = new Date(document.getElementById('check_in_date').value);

            if (flightDate > checkInDate) {
                event.preventDefault();
                alert('La fecha del vuelo debe ser el mismo día o anterior a la fecha de check-in.');
            }
        });
    </script>
</body>
</html>
