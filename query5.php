<?php
require_once ('database_interface.php');

$id=$_POST["query5"];
$name=$_POST["types5"];
$query=null;

if ($name == 'physicalserver') {
    $query='SELECT VirtualServer.vsid, Database.dbid, dockerswarm.dsid, webappfirewall.wafid, loadbalancer.lbid
FROM physicalServer 
LEFT JOIN Runs_On on physicalServer.psid=Runs_On.psid
LEFT JOIN VirtualServer on Runs_On.vsid=VirtualServer.vsid
LEFT JOIN Runs_On_Virtual on Virtualserver.vsid=Runs_on_virtual.vsid
LEFT JOIN Database on Runs_on_virtual.dbid=Database.dbid
LEFT JOIN docker_runs_On on virtualServer.vsid=docker_runs_On.vsid
LEFT JOIN dockerswarm on docker_runs_On.dsid=dockerswarm.dsid
LEFT JOIN runs_web on dockerswarm.dsid=runs_web.dsid
LEFT JOIN webappfirewall on Runs_web.wafid=webappfirewall.wafid
LEFT JOIN balances on webappfirewall.wafid=balances.wafid
LEFT JOIN loadbalancer on balances.lbid=loadbalancer.lbid
where physicalServer.psid=\''.$id.'\'';

}
if ($name == 'virtualserver') {
    $query='
    SELECT Database.dbid, dockerswarm.dsid, webappfirewall.wafid, loadbalancer.lbid
FROM VirtualServer 
LEFT JOIN Runs_On_Virtual on Virtualserver.vsid=Runs_on_virtual.vsid
LEFT JOIN Database on Runs_on_virtual.dbid=Database.dbid
LEFT JOIN docker_runs_On on virtualServer.vsid=docker_runs_On.vsid
LEFT JOIN dockerswarm on docker_runs_On.dsid=dockerswarm.dsid
LEFT JOIN runs_web on dockerswarm.dsid=runs_web.dsid
LEFT JOIN webappfirewall on Runs_web.wafid=webappfirewall.wafid
LEFT JOIN balances on webappfirewall.wafid=balances.wafid
LEFT JOIN loadbalancer on balances.lbid=loadbalancer.lbid
where virtualServer.vsid=\''.$id.'\'';
}
if ($name == 'datacenter') {
    $query='SELECT physicalServer.psid, VirtualServer.vsid, Database.dbid, dockerswarm.dsid, webappfirewall.wafid, loadbalancer.lbid
FROM datacenter 
LEFT JOIN housed_in on datacenter.dcid=housed_in.dcid
LEFT JOIN physicalServer on housed_in.psid=physicalServer.psid
LEFT JOIN Runs_On on physicalServer.psid=Runs_On.psid
LEFT JOIN VirtualServer on Runs_On.vsid=VirtualServer.vsid
LEFT JOIN Runs_On_Virtual on Virtualserver.vsid=Runs_on_virtual.vsid
LEFT JOIN Database on Runs_on_virtual.dbid=Database.dbid
LEFT JOIN docker_runs_On on virtualServer.vsid=docker_runs_On.vsid
LEFT JOIN dockerswarm on docker_runs_On.dsid=dockerswarm.dsid
LEFT JOIN runs_web on dockerswarm.dsid=runs_web.dsid
LEFT JOIN webappfirewall on Runs_web.wafid=webappfirewall.wafid
LEFT JOIN balances on webappfirewall.wafid=balances.wafid
LEFT JOIN loadbalancer on balances.lbid=loadbalancer.lbid
where datacenter.dcid=\''.$id.'\'';

}
if ($name == 'SAN') {
    $query='SELECT physicalServer.psid, VirtualServer.vsid, Database.dbid, dockerswarm.dsid, webappfirewall.wafid, loadbalancer.lbid
FROM san 
LEFT JOIN attached_to on san.sanid=housed_in.attached_to.sanid
LEFT JOIN physicalServer on attached_to.psid=physicalServer.psid
LEFT JOIN Runs_On on physicalServer.psid=Runs_On.psid
LEFT JOIN VirtualServer on Runs_On.vsid=VirtualServer.vsid
LEFT JOIN Runs_On_Virtual on Virtualserver.vsid=Runs_on_virtual.vsid
LEFT JOIN Database on Runs_on_virtual.dbid=Database.dbid
LEFT JOIN docker_runs_On on virtualServer.vsid=docker_runs_On.vsid
LEFT JOIN dockerswarm on docker_runs_On.dsid=dockerswarm.dsid
LEFT JOIN runs_web on dockerswarm.dsid=runs_web.dsid
LEFT JOIN webappfirewall on Runs_web.wafid=webappfirewall.wafid
LEFT JOIN balances on webappfirewall.wafid=balances.wafid
LEFT JOIN loadbalancer on balances.lbid=loadbalancer.lbid
where san.sanid=\''.$id.'\'';

}
if($name == 'database') {
    echo"No depencies";
}
if ($name == 'webappfirewall') {
    $query='SELECT loadbalancer.lbid
FROM webappfirewall
LEFT JOIN balances on webappfirewall.wafid=balances.wafid
LEFT JOIN loadbalancer on balances.lbid=loadbalancer.lbid
where webappfirewall.wafid=\''.$id.'\'';

}
if ($name == 'dockerswarm') {
    $query='SELECT  webappfirewall.wafid, loadbalancer.lbid
FROM dockerswarm
LEFT JOIN runs_web on dockerswarm.dsid=runs_web.dsid
LEFT JOIN webappfirewall on Runs_web.wafid=webappfirewall.wafid
LEFT JOIN balances on webappfirewall.wafid=balances.wafid
LEFT JOIN loadbalancer on balances.lbid=loadbalancer.lbid
where dockerswarm.dsid=\''.$id.'\'';
}
if($name == 'loadbalancer') {
    echo"No depencies";
}

if($query == null){
    echo "No dependencies";
    return;

}
$result=database_interface::query($query);
database_interface::makeTable($result);
?>
