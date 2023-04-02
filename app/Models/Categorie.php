<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $table = "lf_categories";
    protected $primaryKey = "id";
    protected $fillable = array('nom_categorie', 'affiche');
    public $timestamps = false;

    /**
     * Une catégorie a plusieurs sous-catégories
     *
     * @return void
     */
    public function sousCategorie()
    {
        return $this->hasMany(SousCategorie::class);
    }
}
