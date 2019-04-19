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
//FOR INSTALL NEW PLUGIN,YOU HAVE TO INCLUDE THIS LINE
define('FS_METHOD', 'direct');
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress-praxis');

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

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '=08DeyBiah31rr`),GTwnMHBYyBI)q?<x`A(nSFaSHXUO:alNw~Joyx^eD}*+2Dn');
define('SECURE_AUTH_KEY',  'l9%^i~W#cCA0 *vL>g-[t_%O.#6#Y3Hx[`/3e~G]q:UkyH}*4ZVgjk^r>F&5j){[');
define('LOGGED_IN_KEY',    '&N-Y !VF:-,aR-p6O3WA!+WBLy)`Ii2J_e+*1u{CYgNDB3R;YN`=l]Hp|LT1ax[>');
define('NONCE_KEY',        ',2|GH)jtN?P3[3Y[d,Wmb% jBNrZ@!5aKN1b4CUt!T$L: ^+v^lDIJY_n!NlT4`,');
define('AUTH_SALT',        '+=aPL8UJ^5Q[gn9xcxe0owgW1?_d*dY|Hf6iAu?A$?zB~{~Ga1a]lrERK8~AJ*Ot');
define('SECURE_AUTH_SALT', 'YoNT;(5*AEI]O|mAtk/THd}-o&AA_1}fp@rPRNkGWiM!.7-$NRX]gB?YKB7>8Xw%');
define('LOGGED_IN_SALT',   '#U$z#e6!.T=Ur7r*n[_XZUKQqa-$O9h(oF`$FAL|Q:E|XCsri,yB8ZyEQ]}//O;E');
define('NONCE_SALT',       'PcO+!a;Ap6?c@fzHiH(yrWvk:W*$#h}Sw|?BQ{GPnkPJjr>Z]Q.sU*~GBnd_N}.M');

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
