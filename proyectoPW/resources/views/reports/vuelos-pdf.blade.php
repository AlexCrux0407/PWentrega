<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Vuelos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Reporte de Vuelos</h2>
    <table>
        <thead>
            <tr>
                <th>Origen</th>
                <th>Destino</th>
                <th>Fecha de Salida</th>
                <th>Fecha de Llegada</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vuelos as $vuelo)
                <tr>
                    <td>{{ $vuelo->origen }}</td>
                    <td>{{ $vuelo->destino }}</td>
                    <td>{{ $vuelo->fecha_salida }}</td>
                    <td>{{ $vuelo->fecha_llegada }}</td>
                    <td>{{ $vuelo->precio }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
