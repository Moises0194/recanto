<?php
define( 'WP_CACHE', true );

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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u175185357_kcOH2' );

/** Database username */
define( 'DB_USER', 'u175185357_rLQR9' );

/** Database password */
define( 'DB_PASSWORD', 'NEs3xr7QIg' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'i!YrA}w0HV#-Z+.6 oo7TrETK6na]IeY<c!{%/$ 2,LA9+J9[C>=OGu!FuZ$*dP6' );
define( 'SECURE_AUTH_KEY',   ':5+NwD]qeP,dt=8RsfH|xKe-1np[)YAj @:FLTUrTmEj7V)Qg<P#>V$k(a>xkF6;' );
define( 'LOGGED_IN_KEY',     '/Uhxh5dAE+zX9qcjop6jk<Zl#{5qcA8@@<Sp3F/p=gX]bot/=(||HBJ9#R2L[V=<' );
define( 'NONCE_KEY',         'CA~;ZK*g;Rd%t1|^@C1tbymdlET!33rH1279iQ+%{gn$IQ<0|;YJ?Ak2s!)vx(yp' );
define( 'AUTH_SALT',         'WqV3WCfDYUC<__W7De_lKISO4 N/BGG:djic.<;I9UOj,]${+DagxUtr8QOjkg1K' );
define( 'SECURE_AUTH_SALT',  '6:e!R[@bZBC`g~nKdq2|4^&Ouk75REI=si:+1=-QD3blarEQ.q%y;Z}M,_OZ4vFQ' );
define( 'LOGGED_IN_SALT',    'H2Na3nC#hk[RT-R}x- kOwH{Q*SYRz=m*Z@*Fv@)r&?+#I]vQXOO2w]&N}S5[8?|' );
define( 'NONCE_SALT',        'B4v[AXEyZo*Nm6Z(L$RLC>a_#]?n_a4$GK&``/U8%jjnuM{[VnjD/>@YY G&l@H_' );
define( 'WP_CACHE_KEY_SALT', 'jNYIH(w_9ws!5zlm(n,ZZu#AtB=+I-VJ]FL|DQI0t?B2zibo^c;n^%zwv[${Iul@' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', 'c7d555b065d808d68c1b86acf8fed19c' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
