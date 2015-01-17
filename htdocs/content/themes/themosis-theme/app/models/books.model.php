<?php 

class Books_Model extends BaseModel{

	/**
	 * Fetch the promotional book and returns
	 * an object with associated datas. Used for
	 * the home page promo book section.
	 * 
	 * @param object The global $post page object.
	 * @return object
	*/
	public static function getPromoBook($page){

		$book = new stdClass();

        // Define default values
        $book->title = '';
        $book->author = '';
        $book->image = '';
        $book->color = '';
        $book->link = '';

		// Get the book ID
		$id = Meta::get($page->ID, 'book-promo');

		// Handle the case where a book is selected.
		if(!empty($id) && 'none' !== $id){

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
	 * @param int ID of a book to ignore for cross references.
	 * @return array
	*/
	public static function getPopularBooks($id){

		$books = array();

		$query = new WP_Query(array(

			'post_type' => 'bks-books',
			'posts_per_page' => 3,
			'post__not_in'	=> array($id),
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

	/**
	 * Return all books.
	 * 
	 * @return array An array of WP_Posts objects.
	*/
	public static function all(){

		$query = new WP_Query(array(

			'post_type' 		=> 'bks-books',
			'posts_per_page'	=> -1,
			'post_status'		=> 'publish'

			));

		$results = $query->get_posts();

		return $results;

	}

	/**
	 * Return books for promo custom field
	 * situated in the admin home page.
	 * 
	 * @return array key=post_id, value=post_title
	*/
	public static function adminPromoBooks(){

		$books = array();

		foreach (static::all() as $book) {
			$books[$book->ID] = $book->post_title;
		}

		return $books;

	}

}

?>