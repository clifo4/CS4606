<?php
require_once ('database_interface.php');

$id=$_POST["query8"];
$name=$_POST["types8"];
$admin=$_POST["admin8"];
$date_array=getdate();
$date_string = $date_array['mon']."_".$date_array['mday']."_".$date_array['year'];
$query=null;

if ($name == 'physicalserver') {
    $query='UPDATE physicalserver 
SET admin_id = \''.$admin.'\', mm_dd_yyyy=\''.$date_string.'\'
WHERE psID=\''.$id.'\'';

}
if ($name == 'virtualserver') {
    $query='UPDATE virtualserver 
SET admin_id = \''.$admin.'\', mm_dd_yyyy=\''.$date_string.'\'
WHERE pvID=\''.$id.'\'';
}
if ($name == 'datacenter') {
    $query='UPDATE datacenter 
SET admin_id = \''.$admin.'\', mm_dd_yyyy=\''.$date_string.'\'
WHERE dcID=\''.$id.'\'';

}
if ($name == 'SAN') {
    $query='UPDATE SAN 
SET admin_id = \''.$admin.'\', mm_dd_yyyy=\''.$date_string.'\'
WHERE sanID=\''.$id.'\'';
}
if($name == 'database') {
    $query='UPDATE database 
SET admin_id = \''.$admin.'\', mm_dd_yyyy=\''.$date_string.'\'
WHERE databaseID=\''.$id.'\'';
}
if ($name == 'webappfirewall') {
    $query='UPDATE webappfirewall 
SET admin_id = \''.$admin.'\', mm_dd_yyyy=\''.$date_string.'\'
WHERE wafID=\''.$id.'\'';

}
if ($name == 'dockerswarm') {
    $query='UPDATE dockerswarm 
SET admin_id = \''.$admin.'\', mm_dd_yyyy=\''.$date_string.'\'
WHERE dsID=\''.$id.'\'';
}
if($name == 'loadbalancer') {
    $query='UPDATE loadbalancer 
SET admin_id = \''.$admin.'\', mm_dd_yyyy=\''.$date_string.'\'
WHERE lbID=\''.$id.'\'';
}

if($name == 'database') {
    $query='UPDATE database 
SET admin_id = \''.$admin.'\', mm_dd_yyyy=\''.$date_string.'\'
WHERE dbID=\''.$id.'\'';
}

if($query == null){
    echo "Null query";
    return;

}
$result=database_interface::query($query);
database_interface::makeTable($result);
?>