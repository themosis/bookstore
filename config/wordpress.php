<?php

/*
|--------------------------------------------------------------------------
| Notes - README
|--------------------------------------------------------------------------
|
| You can add as many WordPress constants as you want here. Just make sure
| to add them at the end of the file or at least after the "WordPress
| authentication keys and salts" section.
|
*/

/*
|--------------------------------------------------------------------------
| WordPress authentication keys and salts
|--------------------------------------------------------------------------
|
| @link https://api.wordpress.org/secret-key/1.1/salt/
|
*/
define('AUTH_KEY',         'SxJ9%e7HcbM2,N*l1mekvMho%kf>-xFy!@|C@7]tu$6wJiCO^z+h#39fi~%^M8}P');
define('SECURE_AUTH_KEY',  'i6l*b+{ghnz`g[0:+|6=r9|+N{aKA~-2HT5Q|t,A:3|/ia?#7:0bd[^=LQr3<l4.');
define('LOGGED_IN_KEY',    '#0KgeP*%1FcyY7h]Ro<8Y>;`o:u0-^!XCK;ai,NGJx1eTf+?$R--)|!+0aLM.VmC');
define('NONCE_KEY',        'OOQw(9ul^Gzx8:h2o5lNs.`.CaHKcf&e+|++O8YR;)t<HD(-c*^u6/9a4?Ls),7c');
define('AUTH_SALT',        '&[ha|Ukq={9p8=GjIO=*i1ybURBx8UamK2Qmi6D_Zi.~d984FtOx)e5@)cU8Ui7G');
define('SECURE_AUTH_SALT', '?ue1h7_ ,4_ t3p{7z4kyy*+: mN:?8&#@(p9)05)0]>;3v7*0Xgd/1*?||q%xC$');
define('LOGGED_IN_SALT',   'T75z.}a^t,L~1aKc9K3&5MO/U{z?Fj?T4:n/)qL9Iv!eQ0{-E06aO4E+ _1~8nC0');
define('NONCE_SALT',       'eh}L=bG^*d%S8nG1tApGR4f=}:_O@$DX9kD+7rPu=kb!vx?CFGj`5]shR@^td#-<');

/*
|--------------------------------------------------------------------------
| WordPress database
|--------------------------------------------------------------------------
*/
define('DB_NAME', config('database.connections.mysql.database'));
define('DB_USER', config('database.connections.mysql.username'));
define('DB_PASSWORD', config('database.connections.mysql.password'));
define('DB_HOST', config('database.connections.mysql.host'));
define('DB_CHARSET', config('database.connections.mysql.charset'));
define('DB_COLLATE', config('database.connections.mysql.collation'));

/*
|--------------------------------------------------------------------------
| WordPress URLs
|--------------------------------------------------------------------------
*/
define('WP_HOME', config('app.url'));
define('WP_SITEURL', config('app.wp.url'));
define('WP_CONTENT_URL', WP_HOME.'/'.CONTENT_DIR);

/*
|--------------------------------------------------------------------------
| WordPress debug
|--------------------------------------------------------------------------
*/
define('SAVEQUERIES', config('app.debug'));
define('WP_DEBUG', config('app.debug'));
define('WP_DEBUG_DISPLAY', config('app.debug'));
define('SCRIPT_DEBUG', config('app.debug'));

/*
|--------------------------------------------------------------------------
| WordPress auto-update
|--------------------------------------------------------------------------
*/
define('WP_AUTO_UPDATE_CORE', false);

/*
|--------------------------------------------------------------------------
| WordPress file editor
|--------------------------------------------------------------------------
*/
define('DISALLOW_FILE_EDIT', true);

/*
|--------------------------------------------------------------------------
| WordPress default theme
|--------------------------------------------------------------------------
*/
define('WP_DEFAULT_THEME', 'bookstore');

/*
|--------------------------------------------------------------------------
| Application Text Domain
|--------------------------------------------------------------------------
*/
define('APP_TD', env('APP_TD', 'themosis'));

/*
|--------------------------------------------------------------------------
| JetPack
|--------------------------------------------------------------------------
*/
define('JETPACK_DEV_DEBUG', config('app.debug'));
