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
define( 'DB_NAME', 'wp_test_db_cb' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '8rW&;qL|6MovEgZ](CiU9L}*2=oj7Y1y` U[OA1]=yW]t7VxX/rT=cq`/6+eO4iE' );
define( 'SECURE_AUTH_KEY',  'pz(pDRzb!yo/{h/[e<1{R.$~HgTE_S?g_N(_[@{ {)aeZsW=$f*PxR}_]i9MDCE7' );
define( 'LOGGED_IN_KEY',    'p;:(D9>{@M};,5}Y3rnBT<L8K=7C8y.0ryhmPw4rqWbK*VO k|1V}c 6#$Qmy58e' );
define( 'NONCE_KEY',        '.(HcV[UGb:&J6UE/XS7za$oVGq-jT==1o:hTw~8zG{b-,|e@5F<;F/8Djj0^s<Ng' );
define( 'AUTH_SALT',        'n:X.@c 8pYUc~&DlA9Hdl!Rc]V(sxPQ)/`C:++@sQW#IS|yjxF.O FQk VC~|/#n' );
define( 'SECURE_AUTH_SALT', ' `_yJ_sb~Vhfdb%qzT$5_,%P_P;;RE*K<)K4#J@GibQH2_u!@+_W:xu/}TH.;.gc' );
define( 'LOGGED_IN_SALT',   'Q-S(6dejlCiTDA-+9mda6bxp[4VJw)&4`zvC}^uNDL%!8DQ }D,rqfrjIy)frtr}' );
define( 'NONCE_SALT',       '$<HBthYfc2DM0N4oVFMa;k]49II_m,q%:*;%C$>+:3W}g>5)i4yocYY^KX^<rMSb' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
