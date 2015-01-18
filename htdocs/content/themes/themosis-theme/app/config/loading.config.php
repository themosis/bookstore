<?php

return array(

    /**
     * Mapping for all classes without a namespace.
     * The key is the class name and the value is the
     * absolute path to your class file.
     *
     * Watch your commas...
     */
    // Controllers
    'BaseController'        => themosis_path('app').'controllers'.DS.'BaseController.php',
    'PagesController'       => themosis_path('app').'controllers'.DS.'PagesController.php',
    'BooksController'       => themosis_path('app').'controllers'.DS.'BooksController.php',

    // Models
    'PostModel'             => themosis_path('app').'models'.DS.'PostModel.php',
    'Books'                 => themosis_path('app').'models'.DS.'Books.php',
    'Faqs'                  => themosis_path('app').'models'.DS.'Faqs.php'

    // Miscellaneous

);