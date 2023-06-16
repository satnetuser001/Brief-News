<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Article;

class RubricsCombination extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array<int, string>
     */

    protected $fillable = ['policy', 'economy', 'science', 'technologies', 'sport', 'other', 'world', 'local',
    ];

    /**
     * Users who have this rubrics combination
     */
    public function users(){
        return $this->hasMany(User::class);
    }

    /**
     * Articles that have this rubrics combination
     */
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
