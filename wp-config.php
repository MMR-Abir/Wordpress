<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wdpf_wordpress1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'j{>F).hRgw.ZNqHq.[Mk7C7MEwc9`}Zx7XteVSRY*H`&+?*6^Xd2Zek>;$CjNHe{' );
define( 'SECURE_AUTH_KEY',  'BT_c,d[Y),4PKp$yulY2%GSrl~?BCp_UvL8@5^e;22?^%4~-xo][_P Qh1YL)/Aw' );
define( 'LOGGED_IN_KEY',    'k;nQknCIfE}.{?~L&>=zTkL87IAW@xiNUO.HlEe0j-w/[TV((GY&L+oa0lwm=>@3' );
define( 'NONCE_KEY',        '8fri-iSYFoF[-tnSJNfK>!K(uppY5}PQNSAVqo4uO&0vXW6nD,EF;%l);8L67V;j' );
define( 'AUTH_SALT',        '!Zk]zT1C_~iJ2XX|#[TDrAo0fqy88j;+BkhUXu/QvEFvH^3jK3Fjux/vj]&`UiSq' );
define( 'SECURE_AUTH_SALT', 'NvqB<S>ps5D.CRl:x>xR;-C#A?[f$@_pGS/0G0Tv$!G:t 3#8X?7F9EXOa~Pg/<%' );
define( 'LOGGED_IN_SALT',   '$<rqk4<*eS~%6NH$+QhqM}oe7J+5qA!XO)/b:nFi_subq`j:+y56zrBChplxLKVv' );
define( 'NONCE_SALT',       '-/X#7zw%0:37QYc/Zy:i&@!g+9@10GzqdBH5{C(fzhnM~=uG+x/;uu zR2DvXiOH' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'IT_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
