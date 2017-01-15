<?php

/*----------------------------------------------------*/
// WordPress database
/*----------------------------------------------------*/
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', 'utf8mb4_unicode_ci');
$table_prefix = getenv('DB_PREFIX') ? getenv('DB_PREFIX') : 'wp_';

/*----------------------------------------------------*/
// Illuminate database
/*----------------------------------------------------*/
$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => DB_HOST,
    'database'  => DB_NAME,
    'username'  => DB_USER,
    'password'  => DB_PASSWORD,
    'charset'   => DB_CHARSET,
    'collation' => DB_COLLATE,
    'prefix'    => $table_prefix
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$GLOBALS['themosis.capsule'] = $capsule;

/*----------------------------------------------------*/
// Authentication unique keys and salts
/*----------------------------------------------------*/
/*
 * @link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service
 */
define('AUTH_KEY',         'Lkhh>uDzO5~wRz1.bXEKU~@VV{S#-%a%MdO+{&L$+-!W.,m%l.!q*/VVP#Hc|ACo');
define('SECURE_AUTH_KEY',  '`$ 9+LpO~P`,9GFvJ:N<,MxtR<utll-fU:>eq-k-rakJv+;X>u/pg;O|*r5)Qu%[');
define('LOGGED_IN_KEY',    '4JS-.1;rx?jtjqyk^ vtT-QWMC+wZ24YAd89RP})8SUHF4I_G*fmaMLKQ{XXlr^^');
define('NONCE_KEY',        'uQnq8/6k}A)je6d3o##Mn]7GDK|]+E^~[K4%&ynveX:}DO 8pDfIgIF_<oik$H9(');
define('AUTH_SALT',        'f9u24m&#*{<|33]Z|+Jkv^:_gxXWZ%4:emj/eW;sldibf/fB:97Lg9hgzJ,~O~hg');
define('SECURE_AUTH_SALT', '9PvcCRrEW#:*{aKqPWF=QIM u~&K.*VV32rR!i}fjguQp>3%5#3a6im}:gZCkmVp');
define('LOGGED_IN_SALT',   'b>0mTGYnPNiC82}EQFRA?xAvj./0!oZ@G9rX:rLI0Y_cli0L#H+w-T)ZYua*1:fe');
define('NONCE_SALT',       '7s/_KK^)i06/h~D-pIBN|z:sL/J$}_;0-1j!x$Ij6t 98bxI^4Nu]|O8p&41]x^f');

/*----------------------------------------------------*/
// Custom settings
/*----------------------------------------------------*/
define('WP_AUTO_UPDATE_CORE', false);
define('DISALLOW_FILE_EDIT', true);
define('WP_DEFAULT_THEME', 'themosis-theme');

/* That's all, stop editing! Happy blogging. */