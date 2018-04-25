<?php
/**
 * Created by PhpStorm.
 * User: Clifton
 * Date: 4/18/2018
 * Time: 4:25 PM
 */
$dbconn = pg_connect("user='team sick scripts' dbname='team sick scripts' password =123456") 
	or die('Could not connect: ' . pg_last_error());

$query = $_POST["query"];

$result = pg_query($query) or die('Query failed: ' . pg_last_error());
// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
	echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
// Free resultset
pg_free_result($result);
// Closing connection
pg_close($dbconn);

?>
