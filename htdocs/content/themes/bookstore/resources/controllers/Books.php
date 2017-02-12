<?php

namespace Theme\Controllers;

use Themosis\Route\BaseController;

class Books extends BaseController
{
	/**
	 * A Books model instance.
	 *
	 * @var Books
	 */
	protected $books;

	public function __construct()
	{
		$this->books = new Books();
	}

	/**
	 * Render the books archive page.
	*/
	public function archive()
	{
		return View::make('pages.books', array(
			'books'	=> $this->books->all()
		));
	}

	/**
	 * Render the single book request page.
	 *
	 * @param \WP_Post $post
	 * @return mixed
	 */
	public function single($post)
	{
		return View::make('pages.book', array(
			'books'		=> $this->books->getPopularBooks($post->ID)
		));
	}
}
