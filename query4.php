<?php
require_once ('database_interface.php');
$query = "SELECT 'PhysicalServer' as a, psID FROM PhysicalServer UNION SELECT 'VirtualServer' as a, vsID FROM VirtualServer UNION SELECT 'DataCenter' as a, dcID FROM DataCenter UNION SELECT 'SAN' as a, sanID FROM SAN UNION SELECT 'Database' as a, dbID FROM Database UNION SELECT 'WebAppFirewall' as a, wafID FROM WebAppFirewall UNION SELECT 'DockerSwarm' as a, dsID FROM DockerSwarm UNION SELECT 'LoadBalancer' as a, lbID FROM LoadBalancer order by a";
$result=database_interface::query($query);
database_interface::makeTable($result);
?>
