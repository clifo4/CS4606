<?php
require_once ('database_interface.php');
$query = 'SELECT loadbalancer.lbid, loadbalancer.mm_dd_yyyy, loadbalancer.admin_id
FROM loadbalancer, balances
WHERE balances.wafid=\'down-app\' AND balances.lbid=loadbalancer.lbid
';
$result=database_interface::query($query);
database_interface::makeTable($result);
?>
