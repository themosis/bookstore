<?php

namespace App\Http\Controllers;

use App\Book;
use App\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Handle home page.
     *
     * @param \WP_Post $post
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function front(\WP_Post $post)
    {
        $promoBookId = (int) meta($post->ID, 'th_book-promo', true);

        return view('blade.pages.front', [
            'promo' => Book::find($promoBookId),
            'news_url' => ('page' === get_option('show_on_front'))
                ? get_permalink(get_option('page_for_posts'))
                : get_home_url(),
            'latest_articles' => Post::where('post_status', 'publish')
                ->orderby('post_date', 'desc')
                ->take(2)
                ->get()
        ]);
    }
}
