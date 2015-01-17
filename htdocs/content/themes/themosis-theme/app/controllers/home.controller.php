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
	 * Responsible of rendering the home page.
	 * 
	 * @return object.
	*/
	public function index(){

		return View::make('pages.home')->with(array(

			'promo' 	=> Books::getPromoBook($this->page),
			'books' 	=> Books::getPopularBooks($this->bookId),
			'news'		=> News::get(),
			'newspage'	=> get_page_by_path('news')

		));

	}

}

?>