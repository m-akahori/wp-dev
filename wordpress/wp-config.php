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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'wordpress' );

/** MySQL database password */
define( 'DB_PASSWORD', 'wordpress' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          'qlA1qnOBH9?u/ZSIGi><FO)c=b=^k,%l_u1rq&Zl4vL#sI87+s&Tw#;g}pK(;$&U' );
define( 'SECURE_AUTH_KEY',   'MkO@~hB>*s&GBHAwXdPIo?9!,=@38bJ9fDDb%S5F=hBlLO.?vmODl@.MV2rJViIK' );
define( 'LOGGED_IN_KEY',     'F-y~fe1XSg9,z0iWu1u/7Gm_8v.XL9>;Uw`$GHsXw,YW@#{jFsq06FM/cz^}yB.w' );
define( 'NONCE_KEY',         'RpJ%)}WOmeZ0Gp/P-uJo*`v<ZF]G8H[:66Vgco!0NT=%8$0bIjaErP~0_q [sBn5' );
define( 'AUTH_SALT',         'J[1Kosn`cr&Qh)V-+?O!zm8[ ,;1$:&QCw:I#7;-{*[p,/)2{oUvu$=1k:]p[b,E' );
define( 'SECURE_AUTH_SALT',  '39!g>`QxJ8_i>@jZ5dnvnDR~^SIq;-+2bpg(y[_0)}!]<N;9|`FKThIZTPkhbS|f' );
define( 'LOGGED_IN_SALT',    'NTh$]LxL%of9sAE]ZOD]*3t6`=lPY2<b5_-[pF6x<Cs5jhaE4CPqtb$Y{]qcx$C{' );
define( 'NONCE_SALT',        'ehly@Ng80Pnq3Ll, pE>_?4V;Q_*)G-I90Wq#I2Vi{Eepvjd}<h S|vS>Xz;eK#r' );
define( 'WP_CACHE_KEY_SALT', '_hs_WG4@3vg&GwkDV+Jh$q.JY6`#EcH7SR@(5oAB4jg].WEM9g1Rh%8R%^zc@*+J' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


define( 'JETPACK_DEV_DEBUG', True );
define( 'WP_DEBUG', True );
define( 'FORCE_SSL_ADMIN', False );
define( 'SAVEQUERIES', False );

// Additional PHP code in the wp-config.php
// These lines are inserted by VCCW.
// You can place additional PHP code here!


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
