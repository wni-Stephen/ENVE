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
define( 'DB_NAME', 'envecom_qgae1' );

/** Database username */
define( 'DB_USER', 'envecom_qgae1' );

/** Database password */
define( 'DB_PASSWORD', 'F.cVsT5xd7aGE5fvj4y90' );

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
define('AUTH_KEY',         'HVedGJQDoUVw9kj02n0CQXlhF5nCELzsO0qOg9EhBZgPaQlmfiVCAEQpGygVVSUc');
define('SECURE_AUTH_KEY',  'I2gIVwnr7peeyof1N2lSgdWocwVQt0ZOQYrAiwSRGkObDUBm2WGbMPrwHypIGmxB');
define('LOGGED_IN_KEY',    'Hooc4NnekXIX1MKiUYPLX10LFoWunughsZF78G1eWFiPW2LoYcfNP1oEqydcFVst');
define('NONCE_KEY',        'I1gkppQrVmSwcbMtOwMewf6O8sCBhBIhd2Fo4Z7PBpUY6J6ObRAGb1Nk3J8adxXB');
define('AUTH_SALT',        'ZgHx0bQWMnj6ty8TJgrDe705soXVgTT3VmHYcaQGNDQPbTXjE61gqQvE2KnFB4kc');
define('SECURE_AUTH_SALT', '032GSmWQNOEX4bCzluE8g8PQ62COjojGB2GZngAtkkcM2cK6zXJVKUru8QarCMmk');
define('LOGGED_IN_SALT',   'CbWe97ijbhb7933MXUyWHQSkSXBslRATvbTHTWrqZtbWRRCi0D8jwJWwVLcFK5H1');
define('NONCE_SALT',       'QR0nErssChl4fysW9C44rJqcpZG81MLTUwLayFxIcy2r8ftG46KCwl7L0m7QKAsH');

/**
 * Other customizations.
 */
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


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
$table_prefix = 'cwpk_';

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
