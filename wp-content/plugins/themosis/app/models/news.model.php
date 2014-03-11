<?php 

class News_Model extends BaseModel{

	/**
	 * Returns an array of the 2 latest news/posts.
	 * 
	 * @return array Array of WP_Posts objects.
	*/
	public static function get(){

		$query = new WP_Query(array(

			'post_type' 		=> 'post',
			'posts_per_page'	=> 2

		));

		$results = $query->get_posts();

		return $results;

	}

}

?>