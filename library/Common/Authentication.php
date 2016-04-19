<?php
/**
 * Login
 * @author ChatDM
 */
final class Common_Authentication
{
    public static function setUser($data)
    {
        Raonhanh_Session::set(Raonhanh_Session::LOGIN_IDENTITY, $data);
    }
    
    public static function getUser()
    {
        return Raonhanh_Session::get(Raonhanh_Session::LOGIN_IDENTITY);
    }
    
    public static function isAuth()
    {
        return Raonhanh_Session::exists(Raonhanh_Session::LOGIN_IDENTITY);
    }
    
    public static function getID($key=null)
    {
        $data = Raonhanh_Session::get(Raonhanh_Session::LOGIN_IDENTITY);
        return $data[$key];
    }
    
    public static function logout()
    {
        return Raonhanh_Session::remove(Raonhanh_Session::LOGIN_IDENTITY);
    }
}