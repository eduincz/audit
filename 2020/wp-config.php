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
define( 'DB_NAME', 'dextratridacz' );

/** MySQL database username */
define( 'DB_USER', 'dextratridacz' );

/** MySQL database password */
define( 'DB_PASSWORD', 'HAqRXFaSLLW4' );

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
define( 'AUTH_KEY',         'Yl0L@MeR5!p)pvN~>[Pbl,)*N8z.90>a{-aplaKEX}vWr!k7{4pj61/t=i{#*p<l' );
define( 'SECURE_AUTH_KEY',  'd35@)Px4AS>~= 3p:krOu#USd`JPcM&lHDqGa9@xa)7aQs(F$bSt N:FZfkO+fY(' );
define( 'LOGGED_IN_KEY',    '5PZ?%/*0W! G#5M7|*&gFdE%5i|`l_xF2Dy3hu:;z0&^SX.T9CGo7cq|$Oa /}yt' );
define( 'NONCE_KEY',        '|sMH-rn[`%d=N$Z,]@?!#-Dx0p@S-QYY;3J(2YP}[{-)UA!c[}LYe=WgO7^Ppd` ' );
define( 'AUTH_SALT',        ']7a(G-*ZmBiG}!KAla*=)oApY:zxKmN@Yt8bkZfQM_:ktzr ??+M`!cih^/uM>tP' );
define( 'SECURE_AUTH_SALT', 'GPmx`r=!|T7b0>@Bcj(RNshBb@N;nSHkVt;bCMJg`83,EtMBXc?C&MGK:P0FVVUh' );
define( 'LOGGED_IN_SALT',   'MIcZ@~=5fVm+`QyP86sJbP94O+M@61}x[s_pnicKiMRmY4kdd{!X6KD[PuE)]GAv' );
define( 'NONCE_SALT',       'Dk&kK[DrO/@.V9},e)!,{Q$2Bx9Z9l8txDdUp7Pvn1RY1%|0d64,|*g6vKJYK+5f' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'audit2020_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
