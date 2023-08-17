<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Article;

class ArticlePolicy
{
    /**
     * Does the user have a writer role.
     * return bool
     */
    protected function isWriter(User $user)
    {
        return $user->role == 'writer';
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
     * Does the writer try to view his articles.
     * return bool
     */
    public function viewAny($user){
        return $this->isWriter($user);
    }

    /**
     * Does the writer try to create the article.
     * return bool
     */
    public function create($user){
        return $this->isWriter($user);
    }

    /**
     * Check for edit and update.
     * return bool
     */
    public function update($user, $article){
        return $this->isOwner($user, $article);
    }
}
