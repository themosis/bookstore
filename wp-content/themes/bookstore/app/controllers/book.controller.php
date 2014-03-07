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
	 * Returns an array of 3 popular books excepted
	 * the one that is promoted.
	 * 
	 * @return array
	*/
	private function getPopularBooks(){

		$books = array();

		$query = new WP_Query(array(

			'post_type' => 'bks-books',
			'posts_per_page' => 3,
			'post__not_in'	=> array($this->book->ID),
			'post_status'	=> 'publish',
			'orderby'		=> 'rand'

		));

		$results = $query->get_posts();

		foreach($results as $book){

			$b = new stdClass();

			// Title
			$b->title = $book->post_title;

			// Featured image
			$b->image = Meta::get($book->ID, 'book-feature');

			// Color
			$b->color = Meta::get($book->ID, 'color');

			// Excerpt
			$b->excerpt = $book->post_excerpt;

			// Permalink
			$b->link = get_permalink($book->ID);

			// Add the book object
			$books[] = $b;

		}

		return $books;

	}

	/**
	 * Render the single book page.
	*/
	public function index(){

		return View::make('pages.book', array(

			'book'		=> $this->book,
			'books'		=> $this->getPopularBooks()

		));

	}

}

?>