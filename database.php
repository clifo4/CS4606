<?php
require_once ('database_interface.php');

$query = 'SELECT * FROM database';
$result=database_interface::query($query);
database_interface::makeTable($result);

?>
