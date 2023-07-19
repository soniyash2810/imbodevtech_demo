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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db-imobdevtech' );

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

// define('FS_METHOD', 'direct');
// define('ALLOW_UNFILTERED_UPLOADS', true);

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
define( 'AUTH_KEY',         'O5_Z2wPz2^X^]~_?]Dev[l1i7oHImT-SlAVX! <$%?vq)VFr^iy7dT!O4>wod&),' );
define( 'SECURE_AUTH_KEY',  'FKW4tO2iU4SWqZd^Y{HS_-%VHyC=Sck(2{+4OOn}NqR5Bd2].4?X$t3C{Y?5bHR(' );
define( 'LOGGED_IN_KEY',    '|6-Z()kt<2XMX ?hZ@[jO.yQ7_wb@wW1Ceg 8|(CgY*)jh1U`+_cmQBu5~a|(h-I' );
define( 'NONCE_KEY',        '=|.Z)JPCPT<Mae^J)yr|A#qUntJl9]aE?w{gv=(h/d%A]oc0!HTc{Y4@%]+@nw6-' );
define( 'AUTH_SALT',        '5PI4F0dr%/[4~; }O: 78ZREl>zB?|BQ|Vq>So0Jk>mc}UVDMT}yK?SYfN0/sq0N' );
define( 'SECURE_AUTH_SALT', 'Z<1>PdS79lQ+T!CSx2RYAG=*V6J4{AOWxg)8Kb+sS:DWQ1x[Sps^QbgZHU1+{A.~' );
define( 'LOGGED_IN_SALT',   'm}K/Vq|W@]=eF_@%qEaQl>m:cojkY@*Err2!z R,`,@OX.3ehXd1qA^d[[Ou4}O&' );
define( 'NONCE_SALT',       '|$e[^+.9iVyUT=kl=r!yn%!tiSIG,}^aaQ[1/vb<Wf|LDZd%^~@duh8xNwR#8e,w' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
