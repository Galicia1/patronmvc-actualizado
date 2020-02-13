<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';
    public $timestamps = false; //Es para decirle que no tiene campos de auditoria
}
