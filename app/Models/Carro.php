<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $guarded = ['id'];
    
    static $rules = [
            'nome' => 'required|min:3|max:100',
            'placa' => 'required|min:7|max:7',
        ];
}
