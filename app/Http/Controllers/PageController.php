<?php

namespace App\Http\Controllers;

use App\Book;
use App\Post;
use App\Teammate;
use Com\Themosis\Faqs\Models\Faq;
use Illuminate\Database\Eloquent\Collection;
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
            'books' => Book::where('post_status', 'publish')
                ->whereNotIn('ID', [$promoBookId])
                ->inRandomOrder()
                ->take(3)
                ->get(),
            'news_url' => ('page' === get_option('show_on_front'))
                ? get_permalink(get_option('page_for_posts'))
                : get_home_url(),
            'latest_articles' => Post::where('post_status', 'publish')
                ->orderby('post_date', 'desc')
                ->take(2)
                ->get()
        ]);
    }

    /**
     * Handle about page (template).
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('blade.pages.about', [
            'members' => Teammate::where('post_status', 'publish')
                ->get(),
            'latest_articles' => Post::where('post_status', 'publish')
                ->orderby('post_date', 'desc')
                ->take(2)
                ->get()
        ]);
    }

    /**
     * Handle help page (post name).
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Factory|\Illuminate\View\View
     */
    public function help()
    {
        return view('blade.pages.help', [
            'faqs' => class_exists('Com\Themosis\Faqs\Models\Faq')
                ? Faq::where('post_status', 'publish')->get()
                : new Collection()
        ]);
    }
}
