<?php

namespace Theme\Providers;

use Themosis\Foundation\ServiceProvider;

class TwigService extends ServiceProvider
{
    /**
     * Extend the loaded Twig Environment in order to handle
     * extra WordPress core functions like "dynamic_sidebar()".
     */
    public function register()
    {
        /*
         * Retrieve Twig Environment instance.
         */
        $twig = container('twig');

        /*
         * Add the dynamic sidebar function to Twig.
         * Let's call the core function without returning its boolean value
         * saying if the sidebar contains widgets or not => This avoids
         * the 1 or 0 value output appended at the end of the HTML due to Twig
         * evaluation.
         */
        $twig->addFunction(new \Twig_SimpleFunction('dynamic_sidebar', function ($args) {
            dynamic_sidebar($args);
        }));
    }
}