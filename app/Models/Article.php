<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SourceLink;
use App\Models\RubricsCombination;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'rubrics_combination_id', 'header', 'body',
    ];

    /**
     * Get writer this article
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get rubrics combination to this article
     */
    public function rubricsCombination(){
        return $this->belongsTo(RubricsCombination::class);
    }

    /**
     * Get sources links to this article
     */
    public function links(){
        return $this->hasMany(SourceLink::class);
    }
}