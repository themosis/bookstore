<?php

class Books_Controller{

	/**
	 * Render the books page.
	*/
	public function index(){

		return View::make('pages.books', array(

			'books'		=> Books::all()

		));

	}

}

?>