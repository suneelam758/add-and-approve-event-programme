<?php
/**
 * Session class
 *
 * handles the session stuff. creates session when no one exists, sets and
 * gets values, and closes the session properly (=logout). Those methods
 * are STATIC, which means you can call them with Session::get(XXX);
 */
class Session
{
    /**
     * starts the session
     */
    public static function init()
    {
        // if no session exist, start the session
		$time = 60*60*60*60;
        if (session_id() == '') {
			
			ini_set('session.gc_maxlifetime', $time);
			// each client should remember their session id for EXACTLY 1 hour
			session_set_cookie_params($time);
			session_start();
        }
		/*if(isset($_SESSION['ubihrm_lastlogin_time'] )){
			if(time() - strtotime($_SESSION['ubihrm_lastlogin_time']) > 900000) { //subtract new timestamp from the old one
				
				Session::destroy();
			} else {
				$_SESSION['ubihrm_lastlogin_time'] = date("dS M, h:i A"); //set new timestamp
			}
		}*/
    }

    /**
     * sets a specific value to a specific key of the session
     * @param mixed $key
     * @param mixed $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * gets/returns the value of a specific key of the session
     * @param mixed $key Usually a string, right ?
     * @return mixed
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    /**
     * deletes the session (= logs the user out)
     */
    public static function destroy()
    {
        session_destroy();
    }
}
