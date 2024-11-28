@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5 d-flex justify-content-center align-items-center">
    <div class="wrapper" style="max-width: 400px; background-color: #31304D; color: #F0ECE5; padding: 30px; border-radius: 10px;">
        <form action="{{ route('processRegister') }}" method="POST">
            @csrf
            <h1 class="text-center" style="font-size: 28px; font-weight: bold; margin-bottom: 20px;">Registro</h1>
            <div class="input-box mb-3">
                <input type="text" name="nombre" placeholder="Nombre" required style="width: 100%; padding: 10px; border-radius: 5px; border: none; outline: none;">
            </div>
            <div class="input-box mb-3">
                <input type="email" name="email" placeholder="Correo Electrónico" required style="width: 100%; padding: 10px; border-radius: 5px; border: none; outline: none;">
            </div>
            <div class="input-box mb-3">
                <input type="text" name="usuario" placeholder="Usuario" required style="width: 100%; padding: 10px; border-radius: 5px; border: none; outline: none;">
            </div>
            <div class="input-box mb-3">
                <input type="password" name="contraseña" placeholder="Contraseña" required style="width: 100%; padding: 10px; border-radius: 5px; border: none; outline: none;">
            </div>
            <button type="submit" class="btn btn-light w-100 mb-3" style="font-weight: bold; color: #31304D;">Registrarse</button>
            <div class="register-link text-center" style="font-size: 14px;">
                <p>¿Ya tienes una cuenta? <a href="{{ route('login') }}" style="color: #E3FEF7; text-decoration: none; font-weight: bold;">Inicia sesión</a></p>
            </div>
        </form>
        
        @if ($errors->any())
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Errores de Validación',
                    html: `
                        <ul style="text-align: left;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    `,
                    confirmButtonText: 'Aceptar'
                });
            </script>
        @endif
    </div>
</div>
@endsection
