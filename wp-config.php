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
define( 'DB_NAME', 'thetemple' );

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
define( 'AUTH_KEY',         '&qAQkW_@(<a]x:h=}g(S;y@D84Ad$g3-GVaU0mHFdvCZMq[$,N,&t358[*pkDIJ8' );
define( 'SECURE_AUTH_KEY',  '%f97k=V_Kerm.4CAZrlRXX.D+uj%%k;9zTtW3^qN]]~6t%VOp=7n#pkI`G7K-fVH' );
define( 'LOGGED_IN_KEY',    'd#NV@Yd~MFf{-7kP,/1a?{ayrT$Rp`*oK6o7B.;nE06.wuUmy**01<yypo$~hTCs' );
define( 'NONCE_KEY',        '!yWku11oR-Qg%Y|3;.+AG]2mg$mje<GO&upVsa*.~!n6Mj/6#|+G~!A^_1$gRLw~' );
define( 'AUTH_SALT',        '|?<yXy)5G 1~,$!|mDnWLSj/.XUNv|vi+Z],5M28jW9nDvd}!54N?g}w4td!laYb' );
define( 'SECURE_AUTH_SALT', 'Wu=}zR:. *I6gqJ1uMjJ11OYFA;=?]qt+{k}KH+H&-EF&=v%<&UZZs0z/7$nSYqS' );
define( 'LOGGED_IN_SALT',   ']V~Wk#4T0/fsMN`Ug}]^e`y<tScrl{UJIb~umIw,2VEqy+&5b/LMxnSN|VRY08wa' );
define( 'NONCE_SALT',       'UBkF>+${zD|9WbQkP2+/WMcY0!>WAGV%+, ~>@a{ dt>T{GEv46(Raa;$5Kw&}++' );

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
