<?php

namespace Theme\Controllers;

use Theme\Models\Books;
use Theme\Models\Faqs;
use Themosis\Route\BaseController;

class Pages extends BaseController
{
    /**
     * A books model instance.
     *
     * @var
     */
    protected $books;

    /**
     * A faqs model instance.
     *
     * @var
     */
    protected $faqs;

    public function __construct()
    {
        $this->books = new Books();
        $this->faqs = new Faqs();
    }

    /**
     * Handle the home page 'get' request.
     *
     * @param $post
     *
     * @return mixed
     */
    public function home($post)
    {
        // Get the promoted book ID.
        $id = meta('book-promo', $post->ID);

        return view('pages.home', [
            'promo' => $this->books->getPromoBook($id),
            'books' => $this->books->getPopularBooks($id),
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
