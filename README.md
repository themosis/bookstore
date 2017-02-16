Bookstore
=========

The **Bookstore** is a sample project used to demonstrate best practices in developing a WordPress application or website using the Themosis framework.

The project shows to developers how to work with the APIs, how to configure and develop a custom plugin and handle the front-end output with a custom theme.

_Work in progress_

Requirements
------------

- PHP >= 5.6.4
- Themosis framework >= 1.3.0

Installation
------------

The project comes with a local configuration and a MySQL dump. In order to install this demo project on your local machine, please follow the steps below:

1. Download, from our GitHub repository, the project `.zip` file and extract it.
2. Setup a Virtual Host with a local host value of `bookstore.dev`.
3. Set Virtual Host root path to the project `htdocs` directory.
4. From your MySQL local server, create a database with a name of `bookstore`.
5. Create a MySQL user with a username of `demo` and a password of `demo` for `localhost`.
6. Assign the demo user privileges to the `bookstore` database.
7. Import project MySQL data, stored in the project `data/bookstore.sql` file into the `bookstore` database.
8. From the browser, visit the `http://bookstore.dev/` URL.
9. Bookstore project is installed. Enjoy!

WordPress
---------

The imported database contains a default WordPress user with an administrator role.
In order to log in the WordPress administration, use the following access:

- Username: _demo_
- Password: _demo_

Notes
-----

The bookstore project is a simple website showing some of the available APIs of the Themosis framework.

The project is composed of the following elements:

- The Themosis framework core plugin
- The bookstore theme
- A `books-manager` plugin developed based on the Themosis framework [plugin boilerplate](https://github.com/themosis/plugin)
- A `bookstore-faqs` minimalist plugin using some framework APIs
- The `uploads` directory with media images used along the project content

We encourage you to explore both plugins and the theme code in order to get familiar with the APIs of the Themosis framework.