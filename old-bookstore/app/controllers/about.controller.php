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

	public function index(){

		return View::make('pages.about', array(

			'page'		=> $this->page,
			'members'	=> Meta::get($this->page->ID, 'collaborators'),
			'news'		=> News::get(),
			'newspage'	=> get_page_by_path('news')

		));

	}

}

?>