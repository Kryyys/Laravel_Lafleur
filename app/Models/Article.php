<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = "lf_articles";
    protected $primaryKey = "id";
    protected $fillable = array('nom', 'prix_unitaire', 'image', 'quantite_dispo', 'date_inventaire', 'poids', 'taille');
    public $timestamps = false;
}
