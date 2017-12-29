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
define('DB_NAME', 'hoanglien');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3|])oS?r<-HB||s#hE@3pQoY/*4k$@O{/ZU{FbQ-/O@ eA!Gy8ylzY60U?|j a/:');
define('SECURE_AUTH_KEY',  ';Pio(iY$xm0cKW_{O]fsR#=~?x52k pDl:FqL$XareW1;:q6_E.D+8DsTCTn(Ay[');
define('LOGGED_IN_KEY',    '> `e<ldUZQ>-x>TZ]#(0C1etVa$-AmECt@_wEvXbPhZ]C1[RIR1%9`Cdy@2mCw)F');
define('NONCE_KEY',        '/Tc=S-d.hB0yV(w-TLpl/nOr{#*-/uzO?W~7mQgLG8J%[I|DXTyk7X.#<h[mUph#');
define('AUTH_SALT',        'k~kb@S]8Li+I$1~jQnV|^(c9W-IT{h5-bUH>>7i*BD40bZ*+-2`5@0-qrol.LsKv');
define('SECURE_AUTH_SALT', 'jY?~/-F|CBU.u]&9,MMsw/Uce<2$/B~a9qS=c4L%vs$X.s{lwXE`K@a)JlqeP>)_');
define('LOGGED_IN_SALT',   'GPPuzwUC#|VIY>#`3JP^|-iJFj?i2t OC#7|6BF$-3_A{uSr<ZuBOY/PqO?;+vW;');
define('NONCE_SALT',       'be?KyE-rLO?Py5.{cfh{LaR,wN-Cl![g|FjoHoC(rO<29Vk5^{+]$0llp+(Or+<1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
