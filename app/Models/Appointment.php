<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;


class Appointment extends Model
{
    use HasFactory;

    protected $dates = ['appointment_date'];

    public function getAppointmentDateAttribute($value)
    {
        return Carbon::parse($value);  // Esto garantiza la conversión a Carbon
    }

    protected $fillable = ['patient_id', 'doctor_id', 'appointment_date', 'status', 'notes'];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    /**
     * Verificar si el médico está disponible en la fecha y hora solicitada.
     *
     * @param int $doctorId
     * @param string $appointmentDate
     * @return bool
     */
    public static function isDoctorAvailable($doctorId, $appointmentDate)
    {
        // Verificar si ya existe una cita para este médico en la fecha y hora solicitada
        return !self::where('doctor_id', $doctorId)
                    ->where('appointment_date', $appointmentDate)
                    ->exists();
    }
}



