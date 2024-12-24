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
define( 'DB_NAME', 'fe2024_minimo_mizina' );

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
define( 'AUTH_KEY',         'j<SH..@> y@-Rbjk8kYvri>U+Kb%snQ1PJ8sRa8NDWL(~#`<,/sq,%)DSZF}1h&,' );
define( 'SECURE_AUTH_KEY',  'H{Irwl/3h url=NH8PF:%[(Jg-)@Oa+THzm>dZ>*e_x);ng11UeNVhBOxRo#pa{i' );
define( 'LOGGED_IN_KEY',    'gB#|]8j;,oPDc7(iTi0j/fz<pSybKyZZd{y(H/3F^pfgCz|^NQP$J=4ioFQs?VgW' );
define( 'NONCE_KEY',        '$_ -+.1taBYHgq*O)XBqFyU1oyrFE%45KE0_g[0jwn;li||rE,0@xBl)t#@zAHU]' );
define( 'AUTH_SALT',        '2O2Qfl,!Js.fA^((Wuou T-1 rc@.@9.)}@Nf(6YwJT}o[ 9P!Wc_ VzcmwhnT>?' );
define( 'SECURE_AUTH_SALT', 'Q+}Y?rjV%xJXRwkEi}_h,*?km?WD[r9^ry7KM(<C8(O}MTTyoE[HZ2jz6wC/me{!' );
define( 'LOGGED_IN_SALT',   'wZd<Hwh0*9gVaAXc4,Q[8_h6 $u-qQjXR;|v z+`RFM!3.(Z{j8|J.]vMO{ni`9@' );
define( 'NONCE_SALT',       '3FXSKP:qo<.xe!XWyOGYZX1?n0F^k[-;u;%-om.YuMbj/n~B@?`^-CZnQj&13>Ij' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
