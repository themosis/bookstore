<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
if ( file_exists( dirname( __FILE__ ) . '/wp-config-local.php' ) ) {
    
    include( dirname( __FILE__ ) . '/wp-config-local.php' );
    
} else {

	/** The name of the database for WordPress */
	define('DB_NAME', 'database_name_here');

	/** MySQL database username */
	define('DB_USER', 'database_user_here');

	/** MySQL database password */
	define('DB_PASSWORD', 'database_password_here');

	/** MySQL hostname */
	define('DB_HOST', 'localhost');
	
}

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/c|W=AwudokrJC_K1|L9j#(+W|5XOU#.6+6Qyb4cG ~q_-#O|uV_2w@;|l[m**Ro');
define('SECURE_AUTH_KEY',  'i%N!m|y!ivdh3>;S7u2hTqG@Gs:A_~jwaTxAPhGX <2&G|(1~]&TN3qeGLu-<ZD%');
define('LOGGED_IN_KEY',    'j]7R^2:O8u-d-z0MN8V6/>+v|-WBJDkIR%z#Y{*<, QwE3|_YF^XLPu9O(Q%OAl:');
define('NONCE_KEY',        'Ly c=2 VNF e)/= ~*l?jYDaE PNEH=|2f]SKNMS||iwo.WsvM1201}=2Tz]~5,S');
define('AUTH_SALT',        ';_wd0qM[gAyGH`])2.^LB/2B(UvMOV69bsn6Khkj[.Tq;Jai$u|B-pJcIb,WXteH');
define('SECURE_AUTH_SALT', 'k++>[:#X]|+[=g9]>C`qO1X*H!{|dz|ljNa^~S.C+%t~jwW4wpG;Ffew}x_>*LK5');
define('LOGGED_IN_SALT',   '4>D5S<%*hJ(>6eM6*+#e=+y8ch(F+lkt @f2x<|<9Vl!#7^o_`agS@ o8fcCswzz');
define('NONCE_SALT',       'i3-Tav@BIW,M6-ucATr$097#oIT>v4jL+3R[> ({J&;>G%%ZuqeYB%+?OSzs]atR');


/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
