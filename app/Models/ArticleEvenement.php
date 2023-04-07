<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ArticleEvenement extends Pivot
{

    protected $table = 'lf_articles_evenements';

    protected $fillable = [
        'lf_article_id',
        'lf_evenement_id',
    ];
}
