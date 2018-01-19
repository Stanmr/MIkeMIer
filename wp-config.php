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
define('DB_NAME', 'mikemier');

/** MySQL database username */
define('DB_USER', 'mikemier');

/** MySQL database password */
define('DB_PASSWORD', 'mikemier2017');

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
define('AUTH_KEY',         '#)`F>VnJ9&Ko0i -K=HZm/c*n(EA.LkqPTZ3R#o.$q:`^7dk-r}4LcUPX{k4s]fd');
define('SECURE_AUTH_KEY',  'k6gy_Iov*T;fA>7Fg)@_*KA$g>f)(_0E:axuR`YZlLFK}@Q-N/5(I4?JK-=B23o|');
define('LOGGED_IN_KEY',    'M{4_WD$n=p9%7{@>W/w-L<#C424fU&k(SLw+u8o#(|0r(sy]RdF$hP_S-_+9]bqE');
define('NONCE_KEY',        'W3{_{yd0,;tAiqII~5OQ3d[HIIpYAwejQ)tCDI|.,&&MpWHm3-xrB>4Q8?kc$#}{');
define('AUTH_SALT',        'v}(}tza?S%_]AEmUKh4//B%n6rIBj@b7{z 1dX#mRh-rrLerAH%X{e#d#A/|(km?');
define('SECURE_AUTH_SALT', ')bhojLZn8|H4ut`!{Y,X:BSwrL0SnCR^wt;@h*t;b5|U1cig[796/)JkuX-%Zd59');
define('LOGGED_IN_SALT',   '4c$DO(>MBzHLI)`:BF]`J?bza7I_;w<&6PA?Yd?DW=M,/-a]&-U93%)*k)kpxxb7');
define('NONCE_SALT',       '!Mmc_|KV)x,aE/9uA;I9V[F{IW,9s]]~;Tc=I7At{K$/9Y1!;Mh;P<Al`X@x3L@p');

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
