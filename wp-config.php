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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         '4JWVbY?h<A!D1FFAw:)r%fsny@l)3.%/5zo$5vQ}X.NyFnMj/GI_;uM~|]6n0Q.I' );
define( 'SECURE_AUTH_KEY',  'XHa8_J.5)?U0x3y@$Ud 43WI;6R5%!Rf4GxmYA=Y~RS9b8*TF.AmWuO?39i/,&?3' );
define( 'LOGGED_IN_KEY',    ':fVU%G}7n+L84=X~7ezk}-ExFnoZA%3T{A!,~wH7;8?wDyjd]JY6/6bUpUc.66cv' );
define( 'NONCE_KEY',        'WHyIp$$_Uz_7B$i_xgKt7+v4euQnvrNaw}(SwaviUWsL Fjp+g oc<uD)WA-|dMg' );
define( 'AUTH_SALT',        'wrpo<y!0dpbR%N6|B>*v<W=XWv1[X[!$tjUjWzMl_l@+MpoTTgdP2tmbpz1l{#%t' );
define( 'SECURE_AUTH_SALT', 'wF/~aV&],]RP+mAi& vk7(IvVD|dxWygrv/l=%LRvdiG2aFQUrA!m#nJ-w1~cU:V' );
define( 'LOGGED_IN_SALT',   'R3kANP@d%>W^Iw&h)HSmq[[~}JiV:-z1}/LK2$)~.4g!4gw7)9o#w#Ewj=$n]40)' );
define( 'NONCE_SALT',       '6^p>ezWYirIV&7Q|Q]NyS}k}-xG#uq.5o~;e^vPQB%Kvg`49eIT9)j!Xraw4AX]U' );

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
