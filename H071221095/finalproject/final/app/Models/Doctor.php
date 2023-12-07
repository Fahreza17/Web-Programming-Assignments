<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'phone', 'spesialis' , 'room', 'image'];
    public function appointment()
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }
}
