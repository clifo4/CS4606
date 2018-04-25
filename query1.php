<?php
$dbconn = pg_connect("user='team sick scripts' dbname='team sick scripts' password =123456") 
	or die('Could not connect: ' . pg_last_error());
$query = 'select admin.*, count(id)
FROM(
SELECT admin , psID as ID FROM PhysicalServer UNION
SELECT admin , vsID as ID FROM VirtualServer UNION
SELECT admin , dcID as ID FROM DataCenter UNION
SELECT admin , sanID as ID FROM SAN UNION
SELECT admin , dbID as ID FROM Database UNION
SELECT admin , wafID as ID FROM WebAppFirewall UNION
SELECT admin , dsID as ID FROM DockerSwarm UNION
SELECT admin , lbID as ID FROM LoadBalancer)
group by ID
';
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
