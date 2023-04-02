<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorie extends Model
{
    use HasFactory;

    protected $table = "lf_sous_categories";
    protected $primaryKey = "id";
    protected $fillable = array('nom_sous_categorie', 'affiche', 'categorie_id');
    public $timestamps = false;

        /**
     * Une sous-catégorie appartient à une catégorie
     *
     * @return void
     */
    public function Categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

        /**
     * une sous-catégorie a plusieurs articles
     *
     * @return void
     */
    public function article()
    {
        return $this->hasMany(SousCategorie::class);
    }
}
