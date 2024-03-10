<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    
    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'idobra');
    }
    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'idrol');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
    public function asistencias()
    {
        return $this->hasMany(Asistencia::class, 'idempleado');
    }
}
