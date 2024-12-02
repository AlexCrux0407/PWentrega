@extends('layouts.plantilla')

@section('contenido')
<div class="container mt-5 pt-5">
    <h1 class="text-center">Términos y Condiciones</h1>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Términos y Condiciones</h5>
                    <div class="card-text">
                        {!! $termsAndConditions->content ?? 'No hay términos y condiciones disponibles.' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
