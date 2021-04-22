<?php 
namespace Synext\Helpers;
class Session{
    /**
     * Check if session is enable else enable it 
     *
     * @return void
     */
    public static function checkSession(){
        if(session_status() === PHP_SESSION_NONE){session_start();}
    }
    public static function destroy($key){
        self::checkSession();
        unset($_SESSION[$key]);
    }
    /**
     * check if key is in session
     * return true if else false
     * @param [string] $key
     * @return bool
     */
    public static function checkSessionVariable($key){
        if(isset($_SESSION[$key])){
            return true;
        }
        return false;
    }
}