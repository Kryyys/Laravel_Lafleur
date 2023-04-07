<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = "lf_articles";
    protected $primaryKey = "id";
    protected $fillable = array('nom', 'prix_unitaire', 'image', 'quantite_dispo', 'promotion', 'date_inventaire', 'poids', 'taille');
    public $timestamps = false;

    /**
     * Un article appartient à une unité
     *
     * @return void
     */
    public function unite()
    {
        return $this->belongsTo(Unite::class, 'unite_id');
    }

    /**
     * Un article appartient à une sous-catégorie
     *
     * @return void
     */
    public function sousCategorie()
    {
        return $this->belongsTo(SousCategorie::class, 'sous_categorie_id');
    }

    /**
     * Un article appartient à une espèce
     *
     * @return void
     */
    public function espece()
    {
        return $this->belongsTo(Espece::class, 'espece_id');
    }

    /**
     * Un article possède une couleur primaire, et possiblement une couleur secondaire
     *
     * @return void
     */
    public function couleur()
    {
        return $this->belongsTo(Couleur::class);
    }

    /**
     * Un article peut appartenir à plusieurs évènements
     *
     * @return void
     */
    public function evenement()
    {
        return $this->belongsToMany(Evenement::class, 'lf_articles_evenements', 'lf_article_id', 'lf_evenement_id');
    }
}
