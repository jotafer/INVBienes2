<?php

namespace SisInventario;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use Notifiable;

    use Softdeletes;
}
