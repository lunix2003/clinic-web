<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $casts = [
        'status' => 'boolean',
        // 'is_place' => 'boolean',
    ];
    public static function show(){
        $appointments = Appointment::select('appointments.id', 'patients.name as p_name','doctors.name as d_name', 'appointments.appointment_date', 'appointments.appointment_time','appointments.problem','appointments.status')
        	->join('patients', 'patients.id', '=', 'appointments.patient_id')
            ->join('doctors', 'doctors.id','=','appointments.doctor_id')
        	->get();
            return $appointments;

    }
}
