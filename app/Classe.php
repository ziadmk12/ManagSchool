<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    protected $table='classes';
     protected $fillbale=['className','numberStudents','created_at','updated_at'];
}
