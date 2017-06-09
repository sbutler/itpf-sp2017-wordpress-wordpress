<?php
/* Keep here for .ebextensions/00init.config */
define('WP_CACHE', false);

if (!empty($_SERVER['WP_HOME']) && ($_SERVER['WP_HOME'] != 'changeme'))
    define('WP_HOME', $_SERVER['WP_HOME']);
if (!empty($_SERVER['WP_SITEURL']) && ($_SERVER['WP_SITEURL'] != 'changeme'))
    define('WP_SITEURL', $_SERVER['WP_SITEURL']);

/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', $_SERVER['WP_DB_NAME']);

/** MySQL database username */
define('DB_USER', $_SERVER['WP_DB_USER']);

/** MySQL database password */
define('DB_PASSWORD', $_SERVER['WP_DB_PASSWORD']);

/** MySQL hostname */
define('DB_HOST', $_SERVER['WP_DB_HOSTNAME']);

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
define('AUTH_KEY', $_SERVER['WP_AUTH_KEY']);
define('SECURE_AUTH_KEY', $_SERVER['WP_SECURE_AUTH_KEY']);
define('LOGGED_IN_KEY', $_SERVER['WP_LOGGED_IN_KEY']);
define('NONCE_KEY', $_SERVER['WP_NONCE_KEY']);
define('AUTH_SALT', $_SERVER['WP_AUTH_SALT']);
define('SECURE_AUTH_SALT', $_SERVER['WP_SECURE_AUTH_SALT']);
define('LOGGED_IN_SALT', $_SERVER['WP_LOGGED_IN_SALT']);
define('NONCE_SALT', $_SERVER['WP_NONCE_SALT']);

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

define('DISALLOW_FILE_MODS', true);
define('AUTOMATIC_UPDATER_DISABLED', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
