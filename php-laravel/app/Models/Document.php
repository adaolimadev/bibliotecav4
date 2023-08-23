<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = "docsPessoa";
    public $timestamps = false;

    protected $fillable = [
        'data',
        'usercadastrou',
        'obs',
        'ispdf',
        'codpessoa',
        'image'
    ];
}
