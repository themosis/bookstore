<?php

namespace App\Hooks\Books;

use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Filter;

class Search extends Hookable
{
    /**
     * Filter search results to only
     * look after the books posts.
     */
    public function register()
    {
        Filter::add('pre_get_posts', function ($query) {
            if ($query->is_search && ! is_admin()) {
                $query->set('post_type', ['bks-books']);
            }

            return $query;
        });
    }
}
