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
    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <label for="hotel_id">Hotel:</label>
        <select name="hotel_id" id="hotel_id" required>
            <option value="" disabled selected>Selecciona un hotel</option>
            @foreach($hoteles as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->nombre }}</option>
            @endforeach
        </select>

        <label for="vuelo_id">Vuelo:</label>
        <select name="vuelo_id" id="vuelo_id" required>
            <option value="" disabled selected>Selecciona un vuelo</option>
            @foreach($vuelos as $vuelo)
                <option value="{{ $vuelo->id }}">{{ $vuelo->destino }} ({{ $vuelo->origen }})</option>
            @endforeach
        </select>

        <label for="check_in_date">Fecha de Check-in:</label>
        <input type="date" name="check_in_date" id="check_in_date" required>

        <label for="check_out_date">Fecha de Check-out:</label>
        <input type="date" name="check_out_date" id="check_out_date" required>

        <label for="flight_date">Fecha del Vuelo:</label>
        <input type="date" name="flight_date" id="flight_date" required>

        <button type="submit">Crear Reservación</button>
    </form>
</body>
</html>
