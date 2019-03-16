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
define( 'DB_NAME', 'harshniket_blog' );

/** MySQL database username */
define( 'DB_USER', 'blog_user' );

/** MySQL database password */
define( 'DB_PASSWORD', 'blog_user' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1:3306' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         '|j-[(kWE?tR]`5lX|__!j=(Se%(rTfsj-Ma=/dKy&LY1%yx[;IA@!C20{p7|tK`t');
define('SECURE_AUTH_KEY',  '7wdbdk0C7s~{JRpyY,kOPc{>023;8D>+|<zDQO(.h85Vi-XDHMX8~U;Je*]-zL0<');
define('LOGGED_IN_KEY',    'U-noc|&y?.o)uaOl[fg: r1m.|Zu.e7^zRL68Y@fW?-r>HwZ~^Uagx7nYbY^JCS@');
define('NONCE_KEY',        '?P|1J<={:!o]=b-wm*bO9ZNYI6HM:m;xVDxKE6z)N-4YekgJ@y=nF-Vz9tKs+.2I');
define('AUTH_SALT',        '9JJdU6sK?bR.:kP=;K!j`^-E$;n:-rt4g0 .Emgw}&di9b0|q~ZRk{rTT2=;AZ3-');
define('SECURE_AUTH_SALT', 'MGG@V?U3K4TVt7ax|r_hF~#QKv({O-Il<9M-GzJ?7_{UUTi@:},o+4uodWyRIQB#');
define('LOGGED_IN_SALT',   '`VxxK]-|~1}>uX$7s *Y<K~%)C{]cl.f|&^lLM oQ|ZQ(^zT#o7Gk0^b7xj`i+U-');
define('NONCE_SALT',       ')UkDm:mkkEBghR5crWZW*&0[-2,@gTj@UEWSqU,gC/zP9C<-BkcV+jAG/~5+3 x>');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
