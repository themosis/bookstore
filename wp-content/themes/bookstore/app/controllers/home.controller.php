<?php 

class Home_Controller{

	/**
	 * Stores the $post global var.
	*/
	private $page;

	/**
	 * Store the promo book ID
	*/
	private $bookId;

	public function __construct(){
		global $post;

		$this->page = $post;

		$this->bookId = Meta::get($this->page->ID, 'book-promo');
	}

	/**
	 * Fetch the promotional book and returns
	 * an object.
	 * 
	 * @return object
	*/
	private function getPromoBook(){

		$book = new stdClass();

		// Get the book ID
		$id = $this->bookId;

		// Handle the case where a book is selected.
		if('none' !== $id){

			$query = new WP_Query(array(
				'post_type'		=> 'bks-books',
				'p'				=> $id
			));

			$results = $query->get_posts();
			$results = $results[0]; // Get the first one
			
			// Title
			$book->title = $results->post_title;

			// Author
			$book->author = Meta::get($results->ID, 'author');

			// Promo image
			$book->image = Meta::get($results->ID, 'promo-image');

			// Color
			$book->color = Meta::get($results->ID, 'color');

			// Permalink
			$book->link = get_permalink($results->ID);

		}

		return $book;

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
			'post__not_in'	=> array($this->bookId),
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

	public function getNews(){

		$query = new WP_Query(array(

			'post_type' 		=> 'post',
			'posts_per_page'	=> 2

		));

		$results = $query->get_posts();

		return $results;

	}

	/**
	 * Responsible of rendering the home page.
	 * 
	 * @return object.
	*/
	public function index(){

		return View::make('pages.home')->with(array(

			'promo' 	=> $this->getPromoBook(),
			'books' 	=> $this->getPopularBooks(),
			'news'		=> $this->getNews(),
			'newspage'	=> get_page_by_path('news')

		));

	}

}

?>