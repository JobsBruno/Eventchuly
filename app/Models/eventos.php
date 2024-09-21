<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 

class eventos extends Model
{
    use HasFactory;
    protected $primaryKey = 'IdEvento'; // enquanto houver a migration dos eventos esta linha puxa os dados pelo id
    
    protected $fillable = [  /* este array fillable trata de puxar os dados da tabela de eventos*/
        'NomeEvento',
        'DataEvento',
        'LocalEvento',
        'ImgEvento',
    ];
}
