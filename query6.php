<?php
require_once ('database_interface.php');

$id=$_POST["query6"];
$name=$_POST["types6"];
$query=null;

if ($name == 'physicalserver') {
    $query='SELECT san.sanid, datacenter.dcid
FROM physicalServer
LEFT JOIN housed_in on physicalServer.psid=housed_in.psid
LEFT JOIN datacenter on  housed_in.dcid=datacenter.dcid
LEFT JOIN attached_to on physicalServer.psid=attached_to.psid
LEFT JOIN san on  attached_to.sanid=san.sanid
where physicalServer.psid=\''.$id.'\'';

}
if ($name == 'virtualserver') {
    $query='
    SELECT physicalServer.psid, san.sanid, datacenter.dcid
FROM VirtualServer
LEFT JOIN Runs_On on VirtualServer.vsid=Runs_On.vsid
LEFT JOIN physicalServer on Runs_On.psid=physicalServer.psid
LEFT JOIN housed_in on physicalServer.psid=housed_in.psid
LEFT JOIN datacenter on  housed_in.dcid=datacenter.dcid
LEFT JOIN attached_to on physicalServer.psid=attached_to.psid
LEFT JOIN san on  attached_to.sanid=san.sanid
where VirtualServer.vsid=\''.$id.'\'';
}
if ($name == 'datacenter') {
    echo"No depencies";

}
if ($name == 'SAN') {
    echo"No depencies";
}
if($name == 'database') {
    echo"No depencies";
}
if ($name == 'webappfirewall') {
    $query='SELECT dockerswarm.dsid, VirtualServer.vsid, physicalServer.psid, san.sanid, datacenter.dcid
FROM webappfirewall
LEFT JOIN Runs_web on webappfirewall.wafid=Runs_web.wafid
LEFT JOIN dockerswarm on runs_web.dsid=dockerswarm.dsid
LEFT JOIN docker_runs_On on dockerswarm.dsid=docker_runs_On.dsid
LEFT JOIN virtualServer on docker_runs_On.vsid=virtualServer.vsid
LEFT JOIN Runs_On on VirtualServer.vsid=Runs_On.vsid
LEFT JOIN physicalServer on Runs_On.psid=physicalServer.psid
LEFT JOIN housed_in on physicalServer.psid=housed_in.psid
LEFT JOIN datacenter on  housed_in.dcid=datacenter.dcid
LEFT JOIN attached_to on physicalServer.psid=attached_to.psid
LEFT JOIN san on  attached_to.sanid=san.sanid
where webappfirewall.wafid=
=\''.$id.'\'';

}
if ($name == 'dockerswarm') {
    $query='SELECT VirtualServer.vsid, physicalServer.psid, san.sanid, datacenter.dcid
FROM dockerswarm
LEFT JOIN docker_runs_On on dockerswarm.dsid=docker_runs_On.dsid
LEFT JOIN virtualServer on docker_runs_On.vsid=virtualServer.vsid
LEFT JOIN Runs_On on VirtualServer.vsid=Runs_On.vsid
LEFT JOIN physicalServer on Runs_On.psid=physicalServer.psid
LEFT JOIN housed_in on physicalServer.psid=housed_in.psid
LEFT JOIN datacenter on  housed_in.dcid=datacenter.dcid
LEFT JOIN attached_to on physicalServer.psid=attached_to.psid
LEFT JOIN san on  attached_to.sanid=san.sanid
where dockerswarm.dsid=\''.$id.'\'';
}
if($name == 'loadbalancer') {
    $query='SELECT webappfirewall.wafid, dockerswarm.dsid, VirtualServer.vsid, physicalServer.psid, san.sanid, datacenter.dcid
FROM loadbalancer
LEFT JOIN balances on loadbalancer.lbid=balances.lbid
LEFT JOIN webappfirewall on balances.wafid=webappfirewall.wafid
LEFT JOIN Runs_web on webappfirewall.wafid=Runs_web.wafid
LEFT JOIN dockerswarm on runs_web.dsid=dockerswarm.dsid
LEFT JOIN docker_runs_On on dockerswarm.dsid=docker_runs_On.dsid
LEFT JOIN virtualServer on docker_runs_On.vsid=virtualServer.vsid
LEFT JOIN Runs_On on VirtualServer.vsid=Runs_On.vsid
LEFT JOIN physicalServer on Runs_On.psid=physicalServer.psid
LEFT JOIN housed_in on physicalServer.psid=housed_in.psid
LEFT JOIN datacenter on  housed_in.dcid=datacenter.dcid
LEFT JOIN attached_to on physicalServer.psid=attached_to.psid
LEFT JOIN san on  attached_to.sanid=san.sanid
where loadbalancer.lbid=\''.$id.'\'';
}

if($name == 'database') {
    $query='SELECT VirtualServer.vsid, physicalServer.psid, san.sanid, datacenter.dcid
FROM database
LEFT JOIN runs_on_virtual on database.dbid=runs_on_virtual.dbid
LEFT JOIN virtualServer on runs_on_virtual.vsid=virtualServer.vsid
LEFT JOIN Runs_On on VirtualServer.vsid=Runs_On.vsid
LEFT JOIN physicalServer on Runs_On.psid=physicalServer.psid
LEFT JOIN housed_in on physicalServer.psid=housed_in.psid
LEFT JOIN datacenter on  housed_in.dcid=datacenter.dcid
LEFT JOIN attached_to on physicalServer.psid=attached_to.psid
LEFT JOIN san on  attached_to.sanid=san.sanid
where database.dbid=\''.$id.'\'';
}

if($query == null){
    echo "No dependencies";
    return;

}
$result=database_interface::query($query);
database_interface::makeTable($result);
?>