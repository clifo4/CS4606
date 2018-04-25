<?php
require_once ('database_interface.php');

$query='select admin.*, count(id)
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

$result=database_interface::query($query);
database_interface::makeTable($query);
?>