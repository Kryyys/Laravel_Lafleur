<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unite extends Model
{
    use HasFactory;

    protected $table = "lf_unites";
    protected $primaryKey = "id";
    protected $fillable = array('unite');
    public $timestamps = false;

    /**
     * une unité a plusieurs articles
     *
     * @return void
     */
    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
