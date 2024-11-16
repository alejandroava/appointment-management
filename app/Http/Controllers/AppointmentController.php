<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Schedule;
use Carbon\Carbon;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // Obtener todas las citas del usuario autenticado
    $appointments = Appointment::where('patient_id', auth()->user()->id)
    ->orderBy('appointment_date', 'asc') // Opcional: ordenar las citas por fecha
    ->get();

    // Pasar las citas a la vista
    return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = User::role('doctor')->get(); // Método del paquete Spatie

        return view('appointments.create', compact('doctors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'appointment_date' => 'required|date|after:now',
            'notes' => 'nullable|string',
        ]);

        // Verificar si el médico está disponible
        $isAvailable = Appointment::isDoctorAvailable(
            $request->doctor_id,
            $request->appointment_date
        );

        if (!$isAvailable) {
            return back()->withErrors(['error' => 'El médico no está disponible en esa fecha y hora.'])->withInput();
        }

        // Crear la cita
        Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'status' => 'pendiente',
            'notes' => $request->notes,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('appointments.create')->with('success', 'La cita se creó correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public static function isDoctorAvailable($doctor_id, $appointment_date)
{
    $dayOfWeek = Carbon::parse($appointment_date)->dayOfWeek;
    $time = Carbon::parse($appointment_date)->format('H:i:s');

    // Verificar horario
    $schedule = Schedule::where('doctor_id', $doctor_id)
                        ->where('day_of_week', $dayOfWeek)
                        ->where('start_time', '<=', $time)
                        ->where('end_time', '>=', $time)
                        ->first();

    if (!$schedule) {
        return false; // Médico no disponible
    }

    // Verificar si ya tiene una cita
    $existingAppointment = Appointment::where('doctor_id', $doctor_id)
                                      ->where('appointment_date', $appointment_date)
                                      ->first();

    return $existingAppointment ? false : true;
}

}
