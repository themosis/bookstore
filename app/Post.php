<?php

namespace App;

use App\Scopes\PostTypeScope;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const UPDATED_AT = 'post_modified';
    const CREATED_AT = 'post_date';

    protected $primaryKey = 'ID';
    protected $table = 'posts';
    protected static $post_type = 'post';

    /**
     * Apply a post type scope to model.
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PostTypeScope(static::$post_type));
    }
}
