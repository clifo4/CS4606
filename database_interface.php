<?php
/**
 * Created by PhpStorm.
 * User: Keegan
 * Date: 4/25/2018
 * Time: 12:41 AM
 */

//To use, put require_once(database_interface.php); at the top of each php file you want to use it in
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
            "user='".self::$user."'dbname='".self::$dbname."'password ='".self::$password."'")
        or die('Could not connect: ' . pg_last_error());
        $result = pg_query($query) or die('Query failed: ' . pg_last_error());
        // Closing connection
        pg_close($dbconn);
        return $result;
    }

    //Calling this function with the result object from the above query method will make a table with headers

    public static function makeTable($result, $id=null){
        self::initialize();
        $first = true;
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            if($first){
                echo '<table id='.$id.' class=display border=\'1\'>
                <thead>
                <tr>';
                $keys = array_keys($line);
                foreach($keys as $key){
                    echo "<th>$key</th>";
                }
                echo '</tr>
                </thead>';
                $first=false;
            }
            echo "<tr>";
            foreach ($line as $col_value) {
                echo "<td>$col_value</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}