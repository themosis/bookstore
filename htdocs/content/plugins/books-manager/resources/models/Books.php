<?php

namespace Dev\Bookstore\Books\Models;

class Books
{
    /**
     * @var \WP_Query
     */
    protected $query;

    /**
     * @var string
     */
    public $name = 'bks-books';

    /**
     * Found posts.
     *
     * @var array
     */
    protected $items = [];

    public function __construct(\WP_Query $query)
    {
        $this->query = $query;
    }

    /**
     * Try to retrieve WP_Post (organization).
     *
     * @param array $query
     *
     * @return $this
     */
    public function find(array $query)
    {
        $query = wp_parse_args($query, [
            'post_type' => $this->name,
        ]);
        $this->items = $this->query->query($query);
        return $this;
    }

    /**
     * Set the model to retrieve the first item only.
     *
     * @return $this
     */
    public function first()
    {
        if (is_array($this->items) && !empty($this->items)) {
            /*
             * Just return the first one in place
             * of an array.
             */
            $this->items = array_shift($this->items);
        }
        return $this;
    }

    /**
     * Return queried organizations posts.
     *
     * @param bool $query False to return an array of items, true to return a WP_Query instance.
     *
     * @return array|\WP_Post|\WP_Query
     */
    public function get($query = false)
    {
        if ($query) {
            return $this->query;
        }
        return $this->items;
    }

    /**
     * Return a number of found items (books).
     *
     * @return int
     */
    public function count()
    {
        return $this->query->found_posts;
    }

    /**
     * Return a list of items formatted
     * for use in a "<select>" tag.
     *
     * Must be called after a "find" query and before "get".
     *
     * @return $this
     */
    public function select()
    {
        if (!is_array($this->items) || empty($this->items)) {
            return $this;
        }

        /*
         * Default options.
         */
        $options = [
            '' => __("None", BOOKS_MANAGER_TD)
        ];

        foreach ($this->items as $item) {
            $options[$item->ID] = $item->post_title;
        }

        /*
         * Assign results to $items
         */
        $this->items = $options;
        return $this;
    }
}