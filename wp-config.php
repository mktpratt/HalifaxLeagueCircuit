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
define('DB_NAME', 'loldb');

/** MySQL database username */
define('DB_USER', 'mpratt');

/** MySQL database password */
define('DB_PASSWORD', '338392Qq!');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '+0SOi0F;&G[y+#1}Y.R?!2eDhXu}yE=Dtp$xrDa= vA[|H`n6V_6uK~[,[u|F?-=');
define('SECURE_AUTH_KEY',  'Q_Owt-^G`+W#QV*1aaPFFp/M>YD+=|wJ3+?C4|!fY}5v1|r2`+3&S16E g,=n!_U');
define('LOGGED_IN_KEY',    '?ARV5A>UZ-t>pn?mW|zL~*JQ|Z5Bt8~.,pR]L~> | UeRBdz2Ml2Ke{z{FPz,Iin');
define('NONCE_KEY',        'Z5HP0N(2(U:)$dsY {M:Wy;,Z]%zJL=TrXhdP`+#@bU|R3mcZjji#6VkQ@5|s-Iv');
define('AUTH_SALT',        '^_#v[TY_m+Qh6,W$j$7hLXdz+1[lV%6Tm]goYAJG;?zTu?7Y:k% yYrb=QfQ(;6*');
define('SECURE_AUTH_SALT', 'nap/{ezSdLxd$RI=T9 gP;6~}h77bltl-vQM}6[L4#]<=}y#1#!R7^pOd+{?#g>0');
define('LOGGED_IN_SALT',   'UcgysOHF=bZ/*v/3c$X:6?}{+wpUZf/>=$`4Td0:o4:]u-*0Jw<ieG@d|fv5d2=&');
define('NONCE_SALT',       '-0W!Y90)pJaxaMVj{58)b%A>!.rKO1lWqt_`PvMb:e.ED>/pr/fH<QOg-BR{FlcH');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'lol_';

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
