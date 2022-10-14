
<?php

/**
 * Configuration for: Error reporting
 * Useful to show every little problem during development, but only show hard errors in production
 */
error_reporting(E_ALL);
ini_set("display_errors", 1);
/**
 * Configuration for: Base URL
 * This is the base url of our app. if you go live with your app, put your full domain name here.
 * if you are using a (different) port, then put this in here, like http://mydomain:8888/subfolder/
 * Note: The trailing slash is important!
 */

//define('URL', 'http://192.168.10.178/HRMSGLOBAL/');

 $servername = $_SERVER['SERVER_NAME'];
 
 
/**
 * Configuration for: Folders
 * Here you define where your folders are. Unless you have renamed them, there's no need to change this.
 */
define('LIBS_PATH', 'application/libs/');
define('CONTROLLER_PATH', 'application/controllers/');
define('MODELS_PATH', 'application/models/');
define('VIEWS_PATH', 'application/views/');
// don't forget to make this folder writable via chmod 775 or 777 (?)
// the slash at the end is VERY important!
define('AVATAR_PATH', 'public/avatars/');

/**
 * Configuration for: Additional login providers: Facebook
 * Self-explaining. The FACEBOOK_LOGIN_PATH is the controller-action where the user is redirected to after getting
 * authenticated via Facebook. Leave it like that unless you know exactly what you do.
 */

/**
 * Configuration for: Avatars/Gravatar support
 * Set to true if you want to use "Gravatar(s)", a service that automatically gets avatar pictures via using email
 * addresses of users by requesting images from the gravatar.com API. Set to false to use own locally saved avatars.
 * AVATAR_SIZE set the pixel size of avatars/gravatars (will be 44x44 by default). Avatars are always squares.
 * AVATAR_DEFAULT_IMAGE is the default image in public/avatars/
 */
define('USE_GRAVATAR', false);
define('AVATAR_SIZE', 44);
define('AVATAR_JPEG_QUALITY', 85);
define('AVATAR_DEFAULT_IMAGE', 'logo.jpg');

/**
 * Configuration for: Cookies
 * Please note: The COOKIE_DOMAIN needs the domain where your app is,
 * in a format like this: .mydomain.com
 * Note the . in front of the domain. No www, no http, no slash here!
 * For local development .127.0.0.1 is fine, but when deploying you should
 * change this to your real domain, like '.mydomain.com' ! The leading dot makes the cookie available for
 * sub-domains too.
 * @see http://stackoverflow.com/q/9618217/1114320
 * @see php.net/manual/en/function.setcookie.php
 */
// 1209600 seconds = 2 weeks
define('COOKIE_RUNTIME', 1209600);
// the domain where the cookie is valid for, for local development ".127.0.0.1" and ".localhost" will work
// IMPORTANT: always put a dot in front of the domain, like ".mydomain.com" !
define('COOKIE_DOMAIN', '.192.168.0.200');

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, type etc.
 *
 * database type
 * define('DB_TYPE', 'mysql');
 * database host, usually it's "127.0.0.1" or "localhost", some servers also need port info, like "127.0.0.1:8080"
 * define('DB_HOST', '127.0.0.1');
 * name of the database. please note: database and database table are not the same thing!
 * define('DB_NAME', 'login');
 * user for your database. the user needs to have rights for SELECT, UPDATE, DELETE and INSERT
 * By the way, it's bad style to use "root", but for development it will work
 * define('DB_USER', 'root');
 * The password of the above user
 * define('DB_PASS', 'xxx');
 */
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost'); 
// define('DB_NAME', 'Your database name');
// define('DB_USER', 'Your database user');
// define('DB_PASS', 'Your database password');  
define('DB_NAME', 'assesment_evt_sep2022');
/* define('DB_USER', 'ubitechuser01');
define('DB_PASS', 'U3!tech@13'); 
 */
define('DB_USER', 'root');
define('DB_PASS', '');  



