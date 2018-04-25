<?php
require_once ('database_interface.php');

$query = 'SELECT * FROM loadbalancer';
$result=database_interface::query($query);
database_interface::makeTable($result);

?>
