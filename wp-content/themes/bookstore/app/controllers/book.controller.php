<?php

class Book_Controller{

	/**
	 * Stores the global $post
	*/
	private $book;

	public function __construct(){

		global $post;

		$this->book = $post;

	}

	/**
	 * Render the single book page.
	*/
	public function index(){

		return View::make('pages.book', array(

			'book'		=> $this->book,
			'books'		=> Books::getPopularBooks($this->book->ID)

		));

	}

}

?>