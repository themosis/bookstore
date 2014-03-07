<?php

class About_Controller{

	/**
	 * Stores the WP global $post
	*/
	private $page;

	public function __construct(){
		global $post;

		$this->page = $post;
	}

	/**
	 * Fetch the 2 latest news articles.
	*/
	public function getNews(){

		$query = new WP_Query(array(

			'post_type' 		=> 'post',
			'posts_per_page'	=> 2

		));

		$results = $query->get_posts();

		return $results;

	}

	public function index(){

		return View::make('pages.about', array(

			'page'		=> $this->page,
			'members'	=> Meta::get($this->page->ID, 'collaborators'),
			'news'		=> $this->getNews(),
			'newspage'	=> get_page_by_path('news')

		));

	}

}

?>