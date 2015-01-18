<?php

class BooksController extends BaseController
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
}
