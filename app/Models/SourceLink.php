<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class SourceLink extends Model
{
    use HasFactory;

    /**
     * Added a property explicitly specifying the DB table,
     * because the model name doesn't follow the naming rules.
     *
     * @var string
     */
    protected $table = 'sources_links';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = ['article_id', 'link',];

    /**
     * Get an article in which this link use
     */
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
