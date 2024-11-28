<form action="{{ route('admin.hoteles.crear') }}" method="POST">
    @csrf
    <label for="nombre">Nombre del Hotel</label>
    <input type="text" id="nombre" name="nombre" required>

    <label for="ciudad">Ciudad</label>
    <input type="text" id="ciudad" name="ciudad" required>

    <label for="categoria">Categoría</label>
    <input type="text" id="categoria" name="categoria" required>

    <label for="precio_por_noche">Precio por Noche</label>
    <input type="number" id="precio_por_noche" name="precio_por_noche" step="0.01" required>

    <label for="disponibilidad">Disponibilidad</label>
    <input type="number" id="disponibilidad" name="disponibilidad" required>

    <button type="submit">Crear Hotel</button>
</form>
