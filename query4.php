<?php
$dbconn = pg_connect("user='team sick scripts' dbname='team sick scripts' password =123456") 
	or die('Could not connect: ' . pg_last_error());
$query = 'SELECT 'PhysicalServer' as a, psID FROM PhysicalServer UNION SELECT 'VirtualServer' as a, vsID FROM VirtualServer UNION SELECT 'DataCenter' as a, dcID FROM DataCenter UNION SELECT 'SAN' as a, sanID FROM SAN UNION SELECT 'Database' as a, dbID FROM Database UNION SELECT 'WebAppFirewall' as a, wafID FROM WebAppFirewall UNION SELECT 'DockerSwarm' as a, dsID FROM DockerSwarm UNION SELECT 'LoadBalancer' as a, lbID FROM LoadBalancer order by a';
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
