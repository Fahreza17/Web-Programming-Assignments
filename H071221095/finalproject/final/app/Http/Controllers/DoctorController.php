<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Appointment;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function appointmentview () 
    {
        $appointment = Appointment::paginate(3);
        return view("dokter.appointment", compact('appointment'));
    }

    public function tambahappointment(){
        // Mengambil daftar pasien untuk formulir
        $pasien = Pasien::all();

        return view('dokter.tambahappointment', ['pasien' => $pasien]);
    }

    public function uploadAppointment(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'patient_complaints' => 'required|string',
            'status' => 'required|in:menunggu,sedang konsultasi,selesai,ditolak',
            'queue_number' => 'nullable|string',
            'appointment_date' => 'required|date',
        ], [
            'patient_id.exists' => 'The selected patient is invalid.',
            'status.in' => 'The selected status is invalid.',
            // Add more custom messages as needed
        ]);

        // Mengambil ID dokter yang sedang login
        $doctorId = Auth::id();

        // Membuat janji temu dengan menyertakan ID dokter
        $appointment = new Appointment;

        // Set attributes
        $appointment->patient_id = $request->input('patient_id');
        $appointment->doctor_id = $doctorId;
        $appointment->patient_complaints = $request->input('patient_complaints');
        $appointment->status = $request->input('status');
        $appointment->queue_number = $request->input('queue_number');
        $appointment->appointment_date = $request->input('appointment_date');
        // ... tambahkan field lainnya

        $appointment->save();

        // Access the doctor through the relationship
        $doctor = $appointment->doctor;

        return redirect()->back()->with(['success' => 'Jadwal temu berhasil dibuat.', 'doctor' => $doctor]);
    }
}
