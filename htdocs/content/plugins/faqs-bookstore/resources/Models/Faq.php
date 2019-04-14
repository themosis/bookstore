<?php

namespace Com\Themosis\Faqs\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    const UPDATED_AT = 'post_modified';
    const CREATED_AT = 'post_date';

    protected $primaryKey = 'ID';
    protected $table = 'posts';
    protected static $post_type = 'th-faqs';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('type', function (Builder $builder) {
            $builder->where('post_type', static::$post_type);
        });
    }
}
