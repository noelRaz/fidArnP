<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersModel extends Model
{
    use HasFactory;
    protected $table = 'pers';
    protected $primaryKey = 'pers_code';
    protected $fillable = [
        'persNom',
        'persPrenom',
        'persEmail',
        'persFonc',
        'persTel'
    ];

}
