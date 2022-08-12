<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'platziwordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'aG-~.fS_C:c||C?KOMHw/^?8&xxStw3z>JV+.Y?Erf+x_:]_&%~xfYPH,(q}dr1h');
define('SECURE_AUTH_KEY',  'DG++fH?>n-l].Z71S7`t%m|*4~d[-sOqd1-,-nBU+tL>X&8?- JVqG)nij+,M6fc');
define('LOGGED_IN_KEY',    'O~q^,)jfUSzHVsPMUj<1>YiU5=Ky_dijEdKEK]aYM,$|5gU!|d?~WSwd&wDeg:D%');
define('NONCE_KEY',        '^>?FbJJtV-$I@L&l+B9%bai-gz3KpJ|MH]gw+/jy]cLG=!sAZG/f[=zE-(~%q-E9');
define('AUTH_SALT',        '{eJ3(,7M}a@MO+$Jejn^zJTfGFlP=iVu{-WZ&n#4l+n`L9ASx|X:Svzv68H+sOoC');
define('SECURE_AUTH_SALT', 'umD~<,CIDEtT[dT|+v2UP=z9O~A#q`6Mb$$pvQ-:!!5Y=_C4-3QOK;HjrX!0LC9Y');
define('LOGGED_IN_SALT',   'OF>fq|Evcq7SK-:?V8-+Q~itHN.!n JUN$2V<M0sAYCLf& <K;1*iOh@bXuAcB-g');
define('NONCE_SALT',       'qX6<JD#&!%lqw;KbY&3]gyovF!Vc{n!=stsek*.ULA1T+MF^F|u#!+<?lo!W)dtw');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
