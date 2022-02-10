<?php

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', $_ENV['WP_DB_NAME'] ."_es");

/** MySQL database username */
define( 'DB_USER', $_ENV['WP_DB_USER']);

/** MySQL database password */
define( 'DB_PASSWORD', $_ENV['WP_DB_PASSWORD']);

/** MySQL hostname */
define( 'DB_HOST', $_ENV['WP_DB_HOST'] .':3306');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', 'utf8mb4_unicode_ci' );

define( 'AS3CF_SETTINGS', serialize( array(
    'provider' => 'aws',
    'access-key-id' => $_ENV['WP_S3_ACCESS_KEY'],
    'secret-access-key' => $_ENV['WP_S3_SECRET_KEY'],
	'bucket' => $_ENV['WP_S3_BUCKET']
) ) );

define( 'FORCE_SSL', true );
define( 'FORCE_SSL_ADMIN',true );
$_SERVER['HTTPS']='on';

/** Ajustes adventistas.org */
define( 'DISALLOW_FILE_EDIT', true );
define( 'WP_AUTO_UPDATE_CORE', false );
define( 'SITE', 'institucional' );
define( 'PA_LANG', true);

/* Multisite */
define('WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'www.adventistas.org');
define('PATH_CURRENT_SITE', '/es/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define('WP_POST_REVISIONS', 10);


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'g~J-NL(h%8DVlg+ 9_sX4>I3c|s`kU9Y{_D^<PyC:nvNU~BRioW6H/xg[~]sb!a~');
define('SECURE_AUTH_KEY',  'q r,6VWLNf=-&NbP;{39}Fi7(.6!W+X%>|iZ7Yt_0?Htb@3UUmwc1{/|q{l*J!0M');
define('LOGGED_IN_KEY',    ';..=m{x-$Qm+EvI*sr@(w.Y3buFJ?!wQyi]l@t&6]DDbB-DSQ%&uVuilPhK53Xos');
define('NONCE_KEY',        '4)x<m7Znl=^*^ckukAC$e-kXVG7bfd8Gd~{pjl0F>Bu|`E:@^^c_g*%47!E1?cH.');
define('AUTH_SALT',        'G]],%@C]-+7v#X)ILY!7vrd8K!1p|hRvd*mA!Re1U7?4>*5I2d.ZmDUP`K&6<:%p');
define('SECURE_AUTH_SALT', 'KNjZZ`wz=KBYOUL#S[<tB(3p{j+?;,6->0@EB=G5lPGJ@u8lUqqW$0X*O-*+Ge~t');
define('LOGGED_IN_SALT',   'X|+w7OLDOY%B^oL(*Xt|?-P3=!G547Oba~BXMD0;Q~H@J<_54FSgu|96{[=eO&N ');
define('NONCE_SALT',       '=&n0+lE.{-DU!/hYEa2~uDbZ)zMOu~H YQ?^s**NAN]3fd{4ZS-zTi-XK(f+FI~v');

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
define('WPLANG', 'es_ES');

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