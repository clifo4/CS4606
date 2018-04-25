<?php
$dbconn = pg_connect("user='team sick scripts' dbname='team sick scripts' password =123456") 
	or die('Could not connect: ' . pg_last_error());
$query = 'SELECT VirtualServer.vsid, Database.dbid, dockerswarm.dsid, webappfirewall.wafid, loadbalancer.lbid
FROM physicalServer 
LEFT JOIN Runs_On on physicalServer.psid=Runs_On.psid
LEFT JOIN VirtualServer on Runs_On.vsid=VirtualServer.vsid
LEFT JOIN Runs_On_Virtual on Virtualserver.vsid=Runs_on_virtual.vsid
LEFT JOIN Database on Runs_on_virtual.dbid=Database.dbid
LEFT JOIN docker_runs_On on virtualServer.vsid=docker_runs_On.vsid
LEFT JOIN dockerswarm on docker_runs_On.dsid=dockerswarm.dsid
LEFT JOIN runs_web on dockerswarm.dsid=runs_web.dsid
LEFT JOIN webappfirewall on Runs_web.wafid=webappfirewall.wafid
LEFT JOIN balances on webappfirewall.wafid=balances.wafid
LEFT JOIN loadbalancer on balances.lbid=loadbalancer.lbid
where physicalServer.psid='64806'
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
