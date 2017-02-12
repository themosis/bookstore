<?php

namespace Theme\Controllers;

use Dev\Bookstore\Books\Models\Books;
use Theme\Models\Faqs;
use Theme\Models\Posts;
use Themosis\Route\BaseController;

class Pages extends BaseController
{
    /**
     * A faqs model instance.
     *
     * @var
     */
    protected $faqs;

    public function __construct()
    {
        $this->faqs = new Faqs();
    }

    /**
     * Handle the home page.
     *
     * @param \Dev\Bookstore\Books\Models\Books $books The books model.
     * @param \Theme\Models\Posts $posts The posts model class.
     * @param \WP_Post $post The home page WP_Post instance.
     *
     * @return mixed
     */
    public function home(Books $books, Posts $posts, $post)
    {
        // Get the promoted book ID.
        $id = meta('book-promo', $post->ID);

        return view('twig.pages.home', [
            'promo' => $books->find(['p' => $id])->first()->get(),
            'books' => $books->find([
                'posts_per_page'	=> 3,
                'post__not_in'		=> [$id],
                'orderby'			=> 'rand'
            ])->get(),
            'news_url' => ('page' === get_option('show_on_front')) ? get_permalink(get_option('page_for_posts')) : get_home_url(),
            'latest_articles' => $posts->find(['posts_per_page' => 2])->get()
        ]);
    }

    /**
     * Handle about page request.
     *
     * @param \WP_Post $post
     *
     * @return mixed
     */
    public function about($post)
    {
        return view('pages.about', [
            'members' => meta('collaborators', $post->ID),
        ]);
    }

    /**
     * Handle the help page request.
     *
     * @return mixed
     */
    public function help()
    {
        return view('pages.help', [
            'faqs' => $this->faqs->all(),
        ]);
    }
}
