<?php
require_once ('database_interface.php');
$query = "SELECT 'PhysicalServer' as type, psID as ID, mm_dd_yyyy as Date FROM PhysicalServer UNION
SELECT 'VirtualServer' as type, vsID as ID, mm_dd_yyyy as Date FROM VirtualServer UNION
SELECT 'DataCenter' as type, dcID as ID, mm_dd_yyyy as Date FROM DataCenter UNION
SELECT 'SAN' as type, sanID as ID, mm_dd_yyyy as Date FROM SAN UNION
SELECT 'Database' as type, dbID as ID, mm_dd_yyyy as Date FROM Database UNION
SELECT 'WebAppFirewall' as type, wafID as ID, mm_dd_yyyy as Date FROM WebAppFirewall UNION
SELECT 'DockerSwarm' as type, dsID as ID, mm_dd_yyyy as Date FROM DockerSwarm UNION
SELECT 'LoadBalancer' as type, lbID as ID, mm_dd_yyyy as Date FROM LoadBalancer
order by Date DESC
";
$result=database_interface::query($query);
database_interface::makeTable($result);
?>
