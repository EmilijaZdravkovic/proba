<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sat extends Model
{
    use HasFactory;

    protected $fillable = ['proizvodjacID', 'model', 'polID', 'cena'];

    protected $table = 'satovi';
}
