<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Reservación</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <style>
        #countdown {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Crear Reservación de Servicios</h1>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <h2>Reservación de Hotel</h2>
        <label for="hotel_id">Nombre del Hotel:</label>
        <select id="hotel_id" name="hotel_id" required>
            @foreach($hoteles as $hotel)
                <option value="{{ $hotel->id }}">{{ $hotel->nombre }} - ${{ $hotel->precio_por_noche }}</option>
            @endforeach
        </select><br>

        <label for="check_in_date">Fecha de Check-in:</label>
        <input type="date" id="check_in_date" name="check_in_date" required><br>
        <label for="check_out_date">Fecha de Check-out:</label>
        <input type="date" id="check_out_date" name="check_out_date" required><br>

        <h2>Reservación de Vuelo</h2>
        <label for="vuelo_id">Destino del Vuelo:</label>
        <select id="vuelo_id" name="vuelo_id" required>
            @foreach($vuelos as $vuelo)
                <option value="{{ $vuelo->id }}">{{ $vuelo->destino }} - ${{ $vuelo->precio }}</option>
            @endforeach
        </select><br>

        <label for="flight_date">Fecha del Vuelo:</label>
        <input type="date" id="flight_date" name="flight_date" required><br>

        <button type="submit">Guardar Reservaciones</button>
    </form>
</body>
</html>
