<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'rodicevitanicz');

/** MySQL database username */
define('DB_USER', 'rodicevitanicz');

/** MySQL database password */
define('DB_PASSWORD', 'cPbWUswd');

/** MySQL hostname */
define('DB_HOST', 'c182um.forpsi.com');

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
define('AUTH_KEY',         'Oz$%)H<2n~+GmU?:jx.WGO$z-zbe`k}%cs-e>UX{mp_IRY<n$k6jFOx%G-GF99Eo');
define('SECURE_AUTH_KEY',  'o*lywY_CAo>gh:Cy^]<.NJF~v#sK(r`+=Ut4#fe1~ ?VU$fz:>%<nAJ$rdezkwt9');
define('LOGGED_IN_KEY',    ' : 8-Z+-ctySjWyx D `dXh7lPLrwf2G3AkW#+/?(FmB6!$/RsM%&)VZh,gp1K:3');
define('NONCE_KEY',        'kF%7*rZBF^C0 NRde`KBo7L-|`LAa0p9rX(&4/wCeO+u9N-sZ,n[V0{u(UvBEZj[');
define('AUTH_SALT',        '#v5]UUO@QXikKUz}4f?C5Q}M1?{/I]1?,ByWGg L>3oA<Ts-pL(4GYyT=-jAxryl');
define('SECURE_AUTH_SALT', ')baj3T[fTL|Ysb{tjZ f8(X9uA+F96Ds#m/cLLfj5,<D@bn!c<G{a12w(e_e)(U.');
define('LOGGED_IN_SALT',   'F?pW]tr#{t{6A,18]}Js@c->?<9//5G)}Og$*&L]?[r:aqJ2vgh|_{Ba!:*yjMv8');
define('NONCE_SALT',       'O<8#l|ElWAO?`HLtTP/`<b;?ninVZ~K<#;if_RPN=MI4S-YKjpj]C.F[O}jN+o=r');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', 'cs_CZ');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
