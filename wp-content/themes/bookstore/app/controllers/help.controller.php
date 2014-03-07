<?php

class Help_Controller{

	/**
	 * Stores the global $post
	*/
	private $page;

	public function __construct(){
		global $post;

		$this->page = $post;

	}

	/**
	 * Fetch all FAQs custom post types.
	*/
	private function getFaqs(){

		$query = new WP_Query(array(

			'post_type'			=> 'bks-faqs',
			'posts_per_page'	=> -1,
			'post_status'		=> 'publish',
			'order'				=> 'ASC'

		));

		return $query->get_posts();

	}

	/**
	 * Render the 'help' page.
	*/
	public function index(){

		return View::make('pages.help', array(

			'page'		=> $this->page,
			'faqs'		=> $this->getFaqs() 

		));

	}

}

?>