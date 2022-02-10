<?php

// BEGIN iThemes Security - Do not modify or remove this line
// iThemes Security Config Details: 2
define( 'DISALLOW_FILE_EDIT', true ); // Disable File Editor - Security > Settings > WordPress Tweaks > File Editor
// END iThemes Security - Do not modify or remove this line

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'www_pt');

/** MySQL database username */
define('DB_USER', 'advaurora');

/** MySQL database password */
define('DB_PASSWORD', 'ekj9LKowu7ZKnfTKxjJNniuXPnqWjF');

/** MySQL hostname */
define('DB_HOST', 'rds-institucional.internetdsa.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Ajustes adventistas.org */
define('DISALLOW_FILE_EDIT', TRUE); // Sucuri Security: Fri, 03 Apr 2015 18:49:40 +0000
define('SITE', 'institucional');

/* Multisite */
define('WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www.adventistas.org');
define('PATH_CURRENT_SITE', '/pt/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define( 'AWS_ACCESS_KEY_ID', getenv("AWS_ACCESS_KEY_ID") );
define( 'AWS_SECRET_ACCESS_KEY', getenv("AWS_SECRET_ACCESS_KEY") );

define('WP_POST_REVISIONS', 10);

define('FORCE_SSL', true);
define('FORCE_SSL_ADMIN',true);
$_SERVER['HTTPS']='on';

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'u3u<4WS<pH&~oK2+mF23psjI7|D~DiKK9*KRGC#%oJ$lRb~jm)bd)W7{XQ !N/Mj');
define('SECURE_AUTH_KEY',  '/8Lp+.&xgLaY|ABL2g[@oPP|uhO{vym?UcRSS7$sY9=zhMdp;e@inH -tH|,o-kX');
define('LOGGED_IN_KEY',    '2Dd -:35uvpjM4.`%z$+<lC29A<8n@ujbe+$YEvf[Cwi}s=a|NSCCyMZ^o*]+g? ');
define('NONCE_KEY',        '(O=w[|MqJm#Ky-bK~cvi+?dWDJl@b>)weRi+V~IZp<=*6  8bXxYQFr?,Rd!t1bx');
define('AUTH_SALT',        'jG!<p3uuJNdv`PN2|l(l?RX&%+c$dSNjRCmEYRs%UUd#9P<NJ5 dz.-~||WjnjU-');
define('SECURE_AUTH_SALT', '%hG?SNR}4pM9c,c~T~81<UWO7J1C8wv~= [$HH+@nc5b=2ix/Yz|o:QT1.>#8RzG');
define('LOGGED_IN_SALT',   'h0dAx+R.4Lk+.h-|0L:+UXwZn-* f`pm@8C5 ~|05t.II>VcrUbe9 >|D^D0!<Sy');
define('NONCE_SALT',       'Lt+}icL]7asoKBp&f9@Vf2X`]oYc5|j/+.({;`l14o^SckqG(-Bb,f2sS|rxfQsB');

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
define('WPLANG', 'pt_BR');

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
