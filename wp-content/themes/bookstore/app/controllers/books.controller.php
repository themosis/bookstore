<?php

class Books_Controller{

	private function getBooks(){

		$query = new WP_Query(array(

			'post_type' 		=> 'bks-books',
			'posts_per_page'	=> -1,
			'post_status'		=> 'publish'

			));

		$results = $query->get_posts();

		return $results;

	}

	/**
	 * Render the books page.
	*/
	public function index(){

		return View::make('pages.books', array(

			'books'		=> $this->getBooks()

		));

	}

}

?>