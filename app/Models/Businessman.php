<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Businessman extends Model {
    use HasFactory;
    public $timestamps = false;
    protected $table = 'businessmans';
    protected $fillable = ['id', 'full_name', 'cell_phone', 'registered_in', 'id_state', 'state', 'uf_state', 'id_city', 'city', 'id_business_dad'];

}
