@extends('layouts.app')

@section('title', 'Mis Citas')

@section('content')
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Mis Citas Agendadas</h1>

    <!-- Mostrar mensajes de éxito o error si los hay -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($appointments->isEmpty())
        <div class="alert alert-info">
            Aún no tienes citas agendadas.
        </div>
    @else
        <div class="card shadow-lg">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Médico</th>
                            <th scope="col">Fecha y Hora</th>
                            <th scope="col">Notas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->doctor->name }}</td>
                                <td>{{ $appointment->appointment_date->format('d/m/Y H:i') }}</td>
                                <td>{{ $appointment->notes ?? 'No hay notas' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
