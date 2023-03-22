<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;

    protected $table = "lf_sous_categories";
    protected $primaryKey = "id";
    protected $fillable = array('nom_sous_categorie');
    public $timestamps = false;

    /**
     * Une sous-catégorie appartient à une catégorie
     *
     * @return void
    */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
