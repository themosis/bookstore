<?php

class Faqs_Model extends BaseModel{

	/**
	 * Fetch all FAQs custom post types.
	 * 
	 * @return array An array of WP_Posts objects.
	*/
	public static function all(){

		$query = new WP_Query(array(

			'post_type'			=> 'bks-faqs',
			'posts_per_page'	=> -1,
			'post_status'		=> 'publish',
			'order'				=> 'ASC'

		));

		return $query->get_posts();

	}

}

?>