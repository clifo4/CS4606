<?php
require_once ('database_interface.php');

$query = 'SELECT * FROM SAN';
// Printing results in HTML
$result=database_interface::query($query);
database_interface::makeTable($result);

?>
