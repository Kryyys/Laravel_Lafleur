<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espece extends Model
{
    use HasFactory;

    protected $table = "lf_especes";
    protected $primaryKey = "id";
    protected $fillable = array('espece');
    public $timestamps = false;

    /**
     * Une espèce a plusieurs articles
     *
     * @return void
     */
    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
