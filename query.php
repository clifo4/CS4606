<?php
/**
 * Created by PhpStorm.
 * User: Clifton
 * Date: 4/18/2018
 * Time: 4:25 PM
 */
require_once ('database_interface.php');

$query = $_POST["query"];
$result=database_interface::query($query);
database_interface::makeTable($result);

?>
