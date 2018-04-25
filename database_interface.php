<?php
/**
 * Created by PhpStorm.
 * User: Keegan
 * Date: 4/25/2018
 * Time: 12:41 AM
 */

class database_interface
{
    private static $initialized = false;
    private static $user = 'team sick scripts';
    private static $dbname = 'team sick scripts';
    private static $password = '123456';
    /**
    * Construct won't be called inside this class and is uncallable from
    * the outside. This prevents instantiating this class.
    * This is by purpose, because we want a static class.
    */
    private function  __construct()
    {

    }

    private static function initialize()
    {
        if (self::$initialized)
            return;
        self::$initialized = true;
    }

    //Call as database_interface::query("query text")

    public static function query($query){
        self::initialize();
        $dbconn = pg_connect(
            "user=".self::$user."dbname=".self::$dbname."password =".self::$password)
        or die('Could not connect: ' . pg_last_error());
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        // Closing connection
        pg_close($dbconn);
        return $result;
    }

}