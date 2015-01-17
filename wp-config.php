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
/** The name of the database for WordPress */
define('DB_NAME', 'bookstore');

/** MySQL database username */
define('DB_USER', 'wpWrite');

/** MySQL database password */
define('DB_PASSWORD', 'orlenka');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'ZaW2{ 5WF!?Q0n)w[nxO CD:n+2a%O~Huubkg2Nn5P|%G0j&XKUX_XYks|Il.pp ');
define('SECURE_AUTH_KEY',  'YUq4cY<m6w^clQDGtH+Yu6;MU0tqwHBE6:q1?8+q:r @4,d~O6=mx(& h`)3onVq');
define('LOGGED_IN_KEY',    'Dh[HO,MNN Mdm.+F+m$yE8p6D?hvzh#>_;QI6RWo&Y Lt^Sktr:Hr>&8!=M(+|?2');
define('NONCE_KEY',        '|2)L2U%4)C%6]ZZv&zeRexNs-Eb7Hu@DYr^>[EP|SapA,F&M|sgjf2U7C+2RBgV$');
define('AUTH_SALT',        ')B@2/8Heq==+w+s_~$yl-MxjE_d9h?_dIf5M->GhaX08tDm4J7+T?ge9|V-:aj%I');
define('SECURE_AUTH_SALT', '@mz%K?/EBqk+)}U|1k|g&FJ)]}i9z~2/Uok:GEo+ikA.F_Y1.TI#^EFh`fE*ZtQ<');
define('LOGGED_IN_SALT',   'S}~ljJX0%ECV(y-8;8)x~5_ql~dm!]{<$vu0qCq*vdiG)0 1whb_1RUGRPiv9avz');
define('NONCE_SALT',       'EBvvta8hFEmdfKeV$gx|[k v{oJlT>8OaD3byo_0ngSPj|L&xa8?Zgq@$GLm,&ZE');

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

define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
