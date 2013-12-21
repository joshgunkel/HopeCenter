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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'H0p397531');

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
define('AUTH_KEY',         '/{1ai1AH?]0n*PX8 o2:aVF>P+La]I?BaILs?tZsdF{M5f<ECIrK+u9Jy?~}zHVr');
define('SECURE_AUTH_KEY',  ']Lq|4M-L#ixZ0-3N[Wb)a ]5z-J9+HLg| On3+>M)gNEZ1}kM.~7A9+)7}-xb+{|');
define('LOGGED_IN_KEY',    '7EoPJ>|OYVeVJ@;E@}fwq9{.7c`R8-l:J^]?|>SBpp:IOR:llT=n5+Skvj.A?(Nn');
define('NONCE_KEY',        '{+5+m-o5o`wQ_gH+&tv%rMNrtM>.*,Zn{a09|/iFv 1}<_)4j@g5sjnX6|uFQhW2');
define('AUTH_SALT',        'ro@N0A^9FUWa<}DcHp7:3eOLktUr# 8ZQe2VK !h7Lkc2,aw?=:cuB3(&kI/N#!c');
define('SECURE_AUTH_SALT', ' T7#?b4|oXMzPuZ^?`9EG>nPH]||]F8;9sooIon<`>6W.Y^-2l+C6mo6_x9Z:gp~');
define('LOGGED_IN_SALT',   'DUj#Yb7eDSE.%,m7)h-hG)|SC-^Zv`Q(kkzP?{Vdu_4:X+i[y -=&l`p|&S5PQd-');
define('NONCE_SALT',       'k+c_6t,W0)uhXA.QP=BxksBz?Np7*U*GaEt+@M/0tl}y)|aN/RYy VU24qXE?UHx');
define('WP_ALLOW_MULTISITE', true);

define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'dev.hopecenterkc.org');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define( 'SUNRISE', 'on' );

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

