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
	 * Render the 'help' page.
	*/
	public function index(){

		return View::make('pages.help', array(

			'page'		=> $this->page,
			'faqs'		=> Faqs::all() 

		));

	}

}

?>