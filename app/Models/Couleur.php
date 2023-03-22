<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Couleur extends Model
{
    use HasFactory;

    protected $table = "lf_couleurs";
    protected $primaryKey = "id";
    protected $fillable = array('couleur');
    public $timestamps = false;

    /**
     * Une couleur a plusieurs articles
     *
     * @return void
     */
    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
