<?php
require_once ('database_interface.php');
$query='select admin_id, count(id)
FROM (
SELECT admin_id , psID as ID FROM PhysicalServer UNION
SELECT admin_id , vsID as ID FROM VirtualServer UNION
SELECT admin_id , dcID as ID FROM DataCenter UNION
SELECT admin_id , sanID as ID FROM SAN UNION
SELECT admin_id , dbID as ID FROM Database UNION
SELECT admin_id , wafID as ID FROM WebAppFirewall UNION
SELECT admin_id , dsID as ID FROM DockerSwarm UNION
SELECT admin_id , lbID as ID FROM LoadBalancer) as all_items
group by admin_id
';

$result=database_interface::query($query);
database_interface::makeTable($result);
?>
