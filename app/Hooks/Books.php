<?php

namespace App\Hooks;

use Themosis\Hook\Hookable;
use Themosis\PostType\Contracts\PostTypeInterface;
use Themosis\Support\Facades\Field;
use Themosis\Support\Facades\Metabox;
use Themosis\Support\Facades\PostType;

class Books extends Hookable
{
    /**
     * Register the "Books" as a custom post type.
     */
    public function register()
    {
        $book = $this->registerPostType();
        $this->registerMetaboxFor($book);
    }

    /**
     * Register a custom post type in order to handle
     * a collection of books within the WordPress administration.
     *
     * @return PostTypeInterface
     */
    protected function registerPostType(): PostTypeInterface
    {
        return PostType::make('bks-books', __('Books', APP_TD), __('Book', APP_TD))
            ->setArguments([
                'public' => true,
                'rewrite' => [
                    'slug' => __('books', APP_TD)
                ],
                'has_archive' => true,
                'supports' => [
                    'title',
                    'editor',
                    'excerpt',
                    'thumbnail'
                ],
                'menu_icon' => 'dashicons-book'
            ])
            ->setLabels([
                'menu_name' => __('Books Manager', APP_TD)
            ])
            ->set();
    }

    /**
     * Register a custom metabox in order to handle books
     * custom properties like its author, image and color.
     *
     * @param PostTypeInterface $book
     */
    protected function registerMetaboxFor(PostTypeInterface $book)
    {
        Metabox::make('infos', $book->getName())
            ->setTitle(__('Informations', APP_TD))
            ->add(Field::text('author', [
                'rules' => 'required|min:3|max:191'
            ]))
            ->add(Field::media('promo-image', [
                'label' => __('Promo Image', APP_TD),
                'description' => __('Image used on the front page in order to promote the book.', APP_TD)
            ]))
            ->add(Field::color('color', [
                'description' => __('Please choose a book highlight color.', APP_TD),
                'rules' => 'regex:/#[a-fA-F0-9]{6}/'
            ]))
            ->addTranslation('submit', __('Save informations', APP_TD))
            ->set();
    }
}
