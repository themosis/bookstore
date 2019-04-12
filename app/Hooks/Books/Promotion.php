<?php

namespace App\Hooks\Books;

use App\Book;
use Illuminate\Support\Facades\Input;
use Themosis\Hook\Hookable;
use Themosis\Support\Facades\Field;
use Themosis\Support\Facades\Metabox;

class Promotion extends Hookable
{
    /**
     * @var string
     */
    public $hook = 'init';

    /**
     * Add a custom metabox on home/front page
     * in order to define a book for promotion.
     */
    public function register()
    {
        $homeId = (int) get_option('page_on_front');

        $metabox = Metabox::make('promotion', 'page')
            ->setTitle(__('Promoted Book', APP_TD))
            ->add(Field::choice('book-promo', [
                'choices' => $this->getBooksList(),
                'description' => __('Select a book to promote on the home page.', APP_TD),
                'label' => __('Book', APP_TD)
            ]));

        if ((int) Input::get('post', 0) === $homeId) {
            // We only check for registering/display the metabox
            // on the request. We first need to build the instance
            // so it can handle data through the RestAPI.
            $metabox->set();

            // Remove default editor as it is not used for content
            // on our demonstration.
            remove_post_type_support('page', 'editor');
        }
    }

    /**
     * Return a list of books formatted for
     * select field use. Key is the book title
     * and the value is its ID.
     *
     * @return array
     */
    protected function getBooksList(): array
    {
        $books = Book::where('post_status', 'publish')
            ->orderby('post_name', 'asc')
            ->take(200)
            ->get();

        return $books->mapWithKeys(function ($item) {
            return [$item->post_title => $item->ID];
        })->all();
    }
}
