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
define( 'DB_NAME', 'id14847421_wp_386d8437f4d585385dcc3b205931e704' );

/** MySQL database username */
define( 'DB_USER', 'id14847421_wp_386d8437f4d585385dcc3b205931e704' );

/** MySQL database password */
define( 'DB_PASSWORD', 'fa412667f1f6bfdd7ef7773ac45673ecda974a0f' );

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
define( 'AUTH_KEY',          '(@KJ7A#5?bK$JGHD`CN#,|JJ)0WPo^~EdAV)ZM,u/$#2S0P]T4oG1Q^R(6#JyEbI' );
define( 'SECURE_AUTH_KEY',   'Pg5HUq>;|z4Bnq@b#wdpRI(hVQtzHYG-2P73i83;L!2Ij#G8%SopH,rS[]F:Lsg6' );
define( 'LOGGED_IN_KEY',     '6i}4bc1w0r6Us7Z%rf!~QauYvb.W;y[lVsfaeUJ~XtG3Ps2d%?iOa{!<8cej2`[|' );
define( 'NONCE_KEY',         '9Cz&AA^GWx*;h17w8g-#6QHyZRUipH)sI:-tidO&qa+2j@*O^XVY[8@CBaWRWdl{' );
define( 'AUTH_SALT',         '3SHa~VBZ}j11,%>`$rp:DqqG)k!3^>~zy@LX2,UT;D[`~_3PqQ1Z?<%iBY&;<=?a' );
define( 'SECURE_AUTH_SALT',  'b..$itaiMC;jnHcW$cQ(@4YQXlGMf`To,|s*@K0/V#1{Ih{Yxw*9<yQT:0!,h %!' );
define( 'LOGGED_IN_SALT',    '>He+ILhgY4A4JKS(l!0+`_wx_FX=Jt>|`f^gs^A~a%w[sH)NuT=`>`BZ:$|;5{DE' );
define( 'NONCE_SALT',        '%Z1ueryHcN:[zTgyB_vFik<u5I)]?6cKP!meumI ix%v19pxftKG2[3/h^@1(733' );
define( 'WP_CACHE_KEY_SALT', 'B<Z@X%R%r7=j=ok5E%_AYw>Nz{)eOD2NUcBovUH`d+NRmxzie-uKe}>$_K!H-vMC' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
