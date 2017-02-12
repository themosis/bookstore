<?php

namespace Theme\Controllers;

use Dev\Bookstore\Books\Models\Books;
use Theme\Models\Faqs;
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
     * @param \WP_Post $post The home page WP_Post instance.
     *
     * @return mixed
     */
    public function home(Books $books, $post)
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
