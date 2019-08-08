<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'test_db' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'zE9~Q@s_MrU+Dq>/W<-f|C$Q,D(fP&,)8x #I/XXxfk$wKy=p:uRodFZ1gsEO_|.' );
define( 'SECURE_AUTH_KEY',  'uK?8{ddj:Fx7.trR%UL64rYgp&c=_9WFy+Eqwq|Lq8*Sn]MHb]To2zx+bsLZ&hsy' );
define( 'LOGGED_IN_KEY',    '}1rJ?d/g?{1O,7Pd5x23XZV=V6S4_mQ*%j&lp)9PSP }aVyIF#W,J!aqsJ;X1/Y+' );
define( 'NONCE_KEY',        'ec3o>`SEGw(F_v3qqKcABKz7K&ceI^<mP,W<uyO:%#bEC#|UH+S@^8jL&rnf0zvB' );
define( 'AUTH_SALT',        'HZ,b@!VoS^,3fkAFU#v<Q>HX9~7u @#Q,bp#SZ(O^VI7!f:O<XX#!hjbS>`v!<#b' );
define( 'SECURE_AUTH_SALT', 'CTCP^|Gh}<b3bJ4gT*pg|~klmj{^>-O75?e2TEX`dbPX3jc8J.|IBS4&xOO*a-Gc' );
define( 'LOGGED_IN_SALT',   'Ncxo;Kb9!)fz?xT8gXFC@;rA6F93<*O}tL-6mqm4MV}v4-7Wu ce:K(t=/J74uVK' );
define( 'NONCE_SALT',       'iIbuoL.ezjSS_,!pXWuFxKa(UkI#pLbY*KDTD3o8;F.{G3]E,GU5[*;-|I0~`hU8' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_test';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
