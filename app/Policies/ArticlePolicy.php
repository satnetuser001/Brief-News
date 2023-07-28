<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    /**
     * Does the user own the article.
     * return bool
     */
    protected function isOwner(User $user, Article $article)
    {
        return $user->id == $article->user_id;
    }

    /**
     * Admin can do anything.
     * return bool
     */
    public function before($user){
        if ($user->role == 'root' or $user->role == 'admin') {
            return true;
        }
    }

    /**
     * Check for edit and update.
     * return bool
     */
    public function update($user, $article){
        return $this->isOwner($user, $article);
    }
}
