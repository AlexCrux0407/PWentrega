@extends('layouts.plantilla')

@section('contenido')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow-lg"
        style="max-width: 400px; background-color: #31304D; color: #F0ECE5; padding: 30px; border-radius: 10px;">
        <div class="card-body">
            <h1 class="text-center" style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">Inicio de Sesión
            </h1>
            <form action="{{ route('procesarLogin') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="usuario" class="form-label" style="font-weight: bold;">Usuario</label>
                    <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Ingresa tu usuario"
                    required style="border-radius: 5px; background-color: #F0ECE5; color: #135D66;">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="font-weight: bold;">Contraseña</label>
                    <input type="password" id="password" name="password" class="form-control"
                        placeholder="Ingresa tu contraseña" required
                        style="border-radius: 5px; background-color: #F0ECE5; color: #135D66;">
                </div>
                <div class="d-flex justify-content-between align-items-center mb-3" style="font-size: 14px;">
                    <label>
                        <input type="checkbox" name="recordar" style="margin-right: 5px;"> Recordarme
                    </label>
                    <a href="#" style="color: #F0ECE5; text-decoration: none;">¿Olvidaste tu contraseña?</a>
                </div>
                <button type="submit" class="btn w-100 mb-3"
                    style="font-weight: bold; color: #31304D; background-color: #F0ECE5;">Login</button>
                <div class="text-center" style="font-size: 14px;">
                    <p>¿No tienes una cuenta? <a href="{{ route('registro') }}"
                            style="color: #F0ECE5; text-decoration: none; font-weight: bold;">Regístrate</a></p>
                </div>
            </form>

        </div>
    </div>
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: "{{ $errors->first() }}",
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: "{{ session('success') }}",
                confirmButtonText: 'Aceptar'
            });
        </script>
    @endif
</div>
@endsection