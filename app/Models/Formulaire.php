<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formulaire extends Model
{
    use HasFactory;

    protected $table = "lf_formulaires";
    protected $primaryKey = "id";
    protected $fillable = array('traite');
    public $timestamps = false;
}
