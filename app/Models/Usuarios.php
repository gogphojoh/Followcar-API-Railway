<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuarios extends Model
{
    use HasFactory;
    protected $table = 'Usuarios';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['Nombre', 'Apellido', 'email', 'Telefono'];
}
