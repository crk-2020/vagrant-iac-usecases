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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'b8*ZIgorq`5>k*=id#CtdCJOP{0$W;BvBW5Yn?~W{nuox.K{`hh*lF9^-6vk%g?{' );
define( 'SECURE_AUTH_KEY',   '[ki}CA>@&Yz|r`MG*$x ()K,Mz#uR R!uaS~3d{2ALd`4u`(Q>!*!e [}cOilxh+' );
define( 'LOGGED_IN_KEY',     'Lv/r}E>L[D[6,f;R[)G?D:/tPzsM&L_QPQ.LDyD}mY~XR=xNq4Yk9.|>_G[9.@/B' );
define( 'NONCE_KEY',         '6eXyx{BkXOmrZ:dw.i.?8*DvPilw-`*.1yKf;2%IUis]pfOm-nbr9+,^3bs-?S77' );
define( 'AUTH_SALT',         'oHGA)KcXrzv[&JDd$/hpJFMO$e:hO>`3s{KE{Vf@NJT8|7[5vh/(>`&bwTT8X mo' );
define( 'SECURE_AUTH_SALT',  '!(4&q-Cp*/u{-Xi!fJ}&~~LCN=F:pHa^G<E3@=fK(}.&;/b6&(Gb.9fB&7].%u`O' );
define( 'LOGGED_IN_SALT',    'vSn-NKA{VpwZVYB }wwpKQ^-sZ0+$y:=v2|aJ=s^fSAD)qqocuB]RP`V2gm25U1y' );
define( 'NONCE_SALT',        'jwp:}d+U%&X;x`X;!+O.0]K=Ryh.2wgQ`Y&l8lId/@Hi9Nm(!Kc}J#V^4P>N((#m' );
define( 'WP_CACHE_KEY_SALT', '}SX8CLCs28YNz&Z~^GlvEtG4 wj+>X-)5P~wdoU>Bq^=Ejn *y|?P3d=9`<8&><7' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'JETPACK_DEV_DEBUG', True );
define( 'WP_DEBUG', True );
define( 'FORCE_SSL_ADMIN', False );
define( 'SAVEQUERIES', False );

// Additional PHP code in the wp-config.php
// These lines are inserted by VCCW.
// You can place additional PHP code here!


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
