Bookstore - Demo
================

This is a demo website illustrating the use of WordPress and the Themosis framework in order to build a custom website.

Feel free to navigate through the code. Make sure to review the code in the following directories:

1. wp-content/plugins/themosis/**app/**
2. wp-content/themes/bookstore/**app/**

**Note:** This is purely a code demo. The purpose of this project is to demonstrate the use of the framework APIs. There is no complete sanitization and validation of some user inputs nor check for empty values, ...

### Installation

Follow the next steps in order to install this project on your local machine.

1. Clone the repository on your local machine.
2. Define a virtual host with a name of: `bookstore.local` (make sure to use the `local` tld so when you import the content, the paths match)
3. Install WordPress as usual (set your wp-config.php file)
4. Activate the **Themosis** plugin
5. Import the content by using **Tools->Import** (WordPress) and select the `bookstore.wordpress.xml` file from the root directory of the project. Check the option `Download and import file attachmnents`.
6. Active the **Bookstore (Themosis)** theme
7. In **Settings->Permalink**, set a permalink structure (for example: Post name)
8. In **Settings->Reading**, set the `Home` page as the front/home and the `news` page as the blog/post page.
9. Update the main menu in **Appearance->Menus** and set its `Theme locations` to `Header navigation` and `Footer navigation`.
10. Enjoy!

Feel free to report any issue during installation using this repository issue system.

> It's also possible that you will have to run the `composer update` command inside the `plugins/themosis` directory to re-install/update the library dependency after cloning the repository on your computer. If you have an issue with `composer`, simply delete the `vendor` directory and run the `composer install` command to install the dependency back.

### Documentation

Check the [themosis/documentation](https://github.com/themosis/documentation) repository for the APIs documentation.

### Thanks for trying out the Themosis framework.

For more updates, please follow us on Twitter [@Themosis](http://twitter.com/Themosis) or subscribe to our [mailing-list](http://www.themosis.com/).

### Images

All images belong to their respective author:

- [A Book Apart](http://www.abookapart.com/)
- [Ryan Putnam](http://dribbble.com/RypeArts)
