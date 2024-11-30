<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumen de Reservación</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">
    <style>
        #countdown {
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Resumen de Reservaciones</h1>

    <!-- Reloj de 48 Horas -->
    <div id="countdown"></div>

    @if(session('reservations'))
    <div>
        <h2>Resumen de Reservaciones</h2>
        <p><b>Hotel:</b> {{ session('reservations')['hotel_name'] }}</p>
        <p><b>Ciudad:</b> {{ session('reservations')['hotel_city'] }}</p>
        <p><b>Categoría:</b> {{ session('reservations')['hotel_category'] }}</p>
        <p><b>Fecha de Check-in:</b> {{ session('reservations')['check_in_date'] }}</p>
        <p><b>Fecha de Check-out:</b> {{ session('reservations')['check_out_date'] }}</p>
        <p><b>Precio por Noche:</b> ${{ session('reservations')['hotel_price'] }}</p>
        <p><b>Total del Hotel:</b> ${{ session('reservations')['hotel_price'] * (strtotime(session('reservations')['check_out_date']) - strtotime(session('reservations')['check_in_date'])) / 86400 }}</p>
        <p><b>Vuelo:</b> {{ session('reservations')['flight_name'] }}</p>
        <p><b>Origen:</b> {{ session('reservations')['flight_origin'] }}</p>
        <p><b>Destino:</b> {{ session('reservations')['flight_destination'] }}</p>
        <p><b>Fecha del Vuelo:</b> {{ session('reservations')['flight_date'] }}</p>
        <p><b>Precio del Vuelo:</b> ${{ session('reservations')['flight_price'] }}</p>
        <p><b>Total a Pagar:</b> ${{ session('reservations')['total'] }}</p>
    </div>
    @else
    <p>No hay reservaciones para mostrar.</p>
    @endif

    <!-- Cancelación de Reservaciones -->
    <button id="cancel-reservation">Cancelar Reservación</button>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    // Función para iniciar el contador
    function startCountdown(duration, display) {
        var timer = duration, hours, minutes, seconds;
        setInterval(function () {
            hours = parseInt(timer / 3600, 10);
            minutes = parseInt((timer % 3600) / 60, 10);
            seconds = parseInt(timer % 60, 10);

            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = hours + ":" + minutes + ":" + seconds;

            if (--timer < 0) {
                timer = duration;
            }
        }, 1000);
    }

    window.onload = function () {
        var countdownTime = 48 * 60 * 60, // 48 horas en segundos
            display = document.querySelector('#countdown');
        startCountdown(countdownTime, display);
    };

    document.getElementById('cancel-reservation').addEventListener('click', function() {
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
                window.location.href = "{{ route('reservations.cancel', ['id' => session('reservations')['id']]) }}";
            }
        })
    });
    </script>
</body>
</html>
