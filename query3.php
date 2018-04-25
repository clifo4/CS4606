<?php
require_once ('database_interface.php');
$query = '';
$result=database_interface::query($query);
database_interface::makeTable($result);
?>
