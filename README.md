Bookstore
=========

The **Bookstore** is a sample project used to demonstrate best practices in developing a WordPress application or website using the Themosis framework.

The project shows to developers how to work with the APIs, how to configure and develop a custom plugin and handle the front-end output with a custom theme.

Requirements
------------

- PHP >= 7.1
- Themosis framework >= 2.0.0

Installation
------------

The project comes with a local configuration and a MySQL dump. In order to install this demo project on your local machine, please follow the steps below:

> Update installation process...

WordPress
---------

The imported database contains a default WordPress user with an administrator role.
In order to log in the WordPress administration, visit the `bookstore.test/login` URL and use the following access:

- Username: _homestead_
- Password: _secret_

Notes
-----

The bookstore project is a simple website showing some of the available APIs of the Themosis framework.

The project is composed of the following elements:

- The Themosis framework core plugin
- The bookstore theme
- A `books-manager` plugin developed based on the Themosis framework [plugin boilerplate](https://github.com/themosis/plugin)
- A `bookstore-faqs` minimalist plugin using some framework APIs
- The `uploads` directory with media images used along the project content

The project's theme is by default configured to use `Blade` views stored into its `resources/views/blade` directory but there are also `Twig` views stored into the `resources/views/twig`.

We encourage you to explore both plugins and the theme code in order to get familiar with the APIs of the Themosis framework.