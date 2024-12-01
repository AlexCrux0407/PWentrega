<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Hoteles</title>
</head>
<body>
    <h1>Reporte de Hoteles</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ciudad</th>
                <th>Precio por Noche</th>
                <th>Disponibilidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hoteles as $hotel)
                <tr>
                    <td>{{ $hotel->id }}</td>
                    <td>{{ $hotel->nombre }}</td>
                    <td>{{ $hotel->ciudad }}</td>
                    <td>{{ $hotel->precio_por_noche }}</td>
                    <td>{{ $hotel->disponibilidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
