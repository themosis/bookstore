<?php

class Faqs
{
	/**
	 * The faq custom post type slug name.
	 *
	 * @var string
	 */
	protected $slug = 'bks-faqs';

	/**
	 * Fetch all FAQs custom post types.
	 * 
	 * @return array An array of WP_Posts objects.
	*/
	public function all()
	{
		$query = new WP_Query(array(
			'post_type'			=> $this->slug,
			'posts_per_page'	=> -1,
			'post_status'		=> 'publish',
			'order'				=> 'ASC'
		));

		return $query->get_posts();
	}
}