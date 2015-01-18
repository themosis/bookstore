<?php 

class Books
{
	/**
	 * The books slug name.
	 *
	 * @var string
	 */
	protected $slug = 'bks-books';

	/**
	 * Fetch the promotional book and returns
	 * an object with associated datas. Used for
	 * the home page promo book section.
	 *
	 * @param int $id The promoted book id.
	 * @return \stdClass
	*/
	public function getPromoBook($id)
	{
		$book = new stdClass();

        // Default values.
        $book->title = '';
        $book->author = '';
        $book->image = '';
        $book->color = '';
        $book->link = '';

		// Handle the case where a book is selected.
		if (!empty($id) && 'none' !== $id)
		{
			$query = new WP_Query(array(
				'post_type'		=> $this->slug,
				'p'				=> $id
			));

			$results = $query->get_posts();
			$results = $results[0];
			
			// Title
			$book->title = $results->post_title;

			// Author
			$book->author = Meta::get($results->ID, 'author');

			// Promo image
			$imageId = Meta::get($results->ID, 'promo-image');
			$image = wp_get_attachment_image_src($imageId, 'book-promo');
			$book->image = $image[0];

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
	 * @param int $id ID of a book to ignore for cross references.
	 * @return array
	*/
	public function getPopularBooks($id)
	{
		$books = array();

		$query = new WP_Query(array(
			'post_type'			=> $this->slug,
			'posts_per_page'	=> 3,
			'post__not_in'		=> array($id),
			'post_status'		=> 'publish',
			'orderby'			=> 'rand'
		));

		$results = $query->get_posts();

		foreach ($results as $book)
		{
			$b = new stdClass();

			// Title
			$b->title = $book->post_title;

			// Featured image
			$b->image = get_the_post_thumbnail($book->ID);

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
	public function all()
	{
		$query = new WP_Query(array(
			'post_type' 		=> $this->slug,
			'posts_per_page'	=> -1,
			'post_status'		=> 'publish'
		));

		$results = $query->get_posts();

		return $results;
	}

	/**
	 * Return books for promo custom field
	 * located in the admin home page.
	 * 
	 * @return array
	*/
	public function published()
	{
		$books = array();

		foreach ($this->all() as $book)
		{
			$books[$book->ID] = $book->post_title;
		}

		return $books;
	}

}