<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SourceLink;

class Article extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'header', 'body', 'policy', 'economy', 'science',
                            'technologies', 'sport', 'other', 'world', 'local',
    ];

    /**
     * Get article writer
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get sources links to this article
     */
    public function links(){
        return $this->hasMany(SourceLink::class);
    }
}