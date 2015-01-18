<?php

class PagesController extends BaseController
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
     * @return mixed
     */
    public function home($post)
    {
        // Get the promoted book ID.
        $id = Meta::get($post->ID, 'book-promo');

        return View::make('pages.home')->with(array(
            'promo'     => $this->books->getPromoBook($id),
            'books'     => $this->books->getPopularBooks($id)
        ));
    }

    /**
     * Handle about page request.
     *
     * @param \WP_Post $post
     * @return mixed
     */
    public function about($post)
    {
        return View::make('pages.about', array(
            'members'	=> Meta::get($post->ID, 'collaborators')
        ));
    }

    /**
     * Handle the help page request.
     *
     * @return mixed
     */
    public function help()
    {
        return View::make('pages.help', array(
            'faqs'		=> $this->faqs->all()
        ));
    }
}