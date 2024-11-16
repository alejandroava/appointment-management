@extends('layouts.app')

@section('title', 'Agendar Cita')

<x-slot name="header">
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <!-- Barra de navegación -->
        <nav class="space-x-4">
            <a href="#inicio" class="text-gray-700 hover:text-blue-500">INICIO</a>
            <a href="/appointments/create" class="text-gray-700 hover:text-blue-500">AGENDAR CITA</a>
            <a href="/appointments" class="text-gray-700 hover:text-blue-500">VER MIS CITAS</a>
        </nav>
    </div>
</x-slot>

@section('content')
<div class="container py-5">
    <h1 class="text-center text-primary mb-4">Agendar Cita Médica</h1>
    
    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Mostrar mensaje de éxito si la cita se creó correctamente -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar mensaje de error si no se pudo agendar la cita -->
    @if ($errors->has('error'))
        <div class="alert alert-danger">
            {{ $errors->first('error') }}
        </div>
    @endif
    
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf

                <!-- Seleccionar Médico -->
                <div class="mb-3">
                    <label for="doctor_id" class="form-label">Seleccione un Médico</label>
                    <select name="doctor_id" id="doctor_id" class="form-select" required>
                        <option value="" disabled selected>Seleccione un médico</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialty }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Seleccionar Paciente (solo para propósito demostrativo, normalmente sería automático) -->
                <div class="mb-3">
                    <label for="patient_id" class="form-label">Seleccione un Paciente</label>
                    <select name="patient_id" id="patient_id" class="form-select" required>
                        <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }}</option>
                    </select>
                </div>

                <!-- Fecha y Hora de la Cita -->
                <div class="mb-3">
                    <label for="appointment_date" class="form-label">Fecha y Hora de la Cita</label>
                    <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" required>
                </div>

                <!-- Notas Opcionales -->
                <div class="mb-3">
                    <label for="notes" class="form-label">Notas (opcional)</label>
                    <textarea name="notes" id="notes" rows="4" class="form-control" placeholder="Añadir notas adicionales..."></textarea>
                </div>

                <!-- Botón de Envío -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Agendar Cita</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
