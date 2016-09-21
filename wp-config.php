<?php


// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         'K%x[?Hqu/YbB$REj%10sFWbQa5NIbc {jS+QG@oi+WW1hool7q|VlYVG$1V+i!FQ');
define('SECURE_AUTH_KEY',  '?s0_C&nZw)#1/Mm3%d:=CNOeup5PpG{ /l8hOyJ#?Ph--%d@H,])-TV%q0Ri;Kzh');
define('LOGGED_IN_KEY',    '/o:>+Kpz >`|`cIy+J(sXE,?Mv+d+bFm%!_9_(G5g`Y/Nj-,?&wlg_$I9PL|nXiu');
define('NONCE_KEY',        'K165N!])<7~rgYVCojF1Z-7L{2n6~S4])=%]Ak3 $!JOQ`dXH.47#&V[` >cwE7<');
define('AUTH_SALT',        'MVWKx-;b>D~stPP.1x;O`N&B)w-j .;5>PW?Z[Kt)&zhHR[ed<j-_=rw+]<8Kq-E');
define('SECURE_AUTH_SALT', 'O?rs+^@F-}-G^%`UG6!Iw+*)S|-xQ_NXk8QFakE.7HWhxpy5rFVl-1{.-Gb%fn3$');
define('LOGGED_IN_SALT',   'oc<8 yjwv%Vf~b-OOV;<1CmSlcZ16d]s-B4{`Keq~JpwV#8^Z.i?TcJj)xov J[y');
define('NONCE_SALT',       'xQ[9s]sjW&3$Rk~]I}z5r:y~2xcwBAGWGc|iu#&6;Z3Yit~bs+Z<Bd]CWqnNpUDO');


$table_prefix = 'wp_';





/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
