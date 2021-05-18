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
define( 'DB_NAME', 'tawpress' );

/** MySQL database username */
define( 'DB_USER', 'kcc' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Telephone1' );

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
define( 'AUTH_KEY',         'KY;s3OX[kWwS~&d4)#;YI5&iNlZoCmdS4+QK?(dmp6`u~WIP`(c8`[2suz_N]y#h' );
define( 'SECURE_AUTH_KEY',  'XEVbFu!KZF7n,%AH9>bt!_wK9l?CHW,c?7gm_1Zb[D(Qn7O7}fpt6,?ak8-4Ynow' );
define( 'LOGGED_IN_KEY',    'qpkx{ZKb#X+*;4=y$Iat6|}|gZ&/n8EG7)b#$<DC4zr0HLJa1l9?-L[[NM|L&o3l' );
define( 'NONCE_KEY',        '[3-MfFEv`phVCv!.8+n:oo(%!@V=8V!u5AJgdi?n?Q>V3R`-Di[3>sHNsGX?H2)H' );
define( 'AUTH_SALT',        ':?=}jT)R?whz@ 3M#wp+6%,ngFK:js^Z>dv.nymx^}lJ83D9/D;pW h5y?E=i*~:' );
define( 'SECURE_AUTH_SALT', 'V>f3Y*v},pt<];yo!.G^jxmN7D+;8(42:Q(xkyO``I/WUbtdJ/Vn+~0;CSUL=ub/' );
define( 'LOGGED_IN_SALT',   '9Wi}rp<ID~II>/P^Z!E9k;!-Y1]F4Asn3nqb1Z1yf0^*HMUZAm@a;j~V>j6=*Mx?' );
define( 'NONCE_SALT',       '|!31KI?X#ghLlcQ X0qngRE%<ltheGLL8k SWDE~nX&BZ{@+~4|;Lr/s%wU+x(4C' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ta_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
