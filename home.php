<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Team Sick Scripts</title>
    <link rel="stylesheet" href="data.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

</head>
<body>
<div class="top-left"><h1>Configuration Management Database</h1>
    <h2><br>Team Members: Keegan Weiler, Jacob Smith, Clifton Overby</h2>
</div>
<button id="ac-large" class="accordion">Relations:</b> The following relations are included in our database system. Click to Expand</button>
    </div>
<div id="panel-large" class="panel-hidden">
        <!--Stuff Goes here-->
        <button class="accordion">Physical Server</button>
        <div class="panel-hidden">
            <?php
            include("physicalserver.php");
            ?>
        </div>

<button class="accordion">Virtual Server</button>
<div class="panel-hidden">
    <?php
    include("virtualserver.php");
    ?>
</div>

<button class="accordion">Data Center</button>
<div class="panel-hidden">
    <?php
    include("datacenter.php");
    ?>
</div>

<button class="accordion">SAN</button>
<div class="panel-hidden">
    <?php
    include("san.php");
    ?>
</div>

<button class="accordion">Database</button>
<div class="panel-hidden">
    <?php
    include("database.php");
    ?>
</div>

<button class="accordion">Docker Swarm</button>
<div class="panel-hidden">
    <?php
    include("DockerSwarm.php");
    ?>
</div>

<button class="accordion">WebAppFirewall</button>
<div class="panel-hidden">
    <?php
    include("webappfirewall.php");
    ?>
</div>

<button class="accordion">LoadBalancer</button>
<div class="panel-hidden">
    <?php
    include("loadbalancer.php");
    ?>
</div>

</div>
<button id="ac-large2" class="accordion">Ad-hoc Query:</b> Click to Expand</button>
    <div id="panel2" class="panel-hidden">
    <form id="activity" METHOD=POST ACTION="">
        <?php
        if (isset($_POST["query"])) {
            echo"<hr>Query entered: </br>".$_POST["query"]."<hr>";
            include("query.php");
            echo"</br>";
            echo"<script type=\"text/javascript\">
                    var panel = document.getElementById('panel2');
        panel.style.display = \"block\";
                </script>";
            unset($_POST["query"]);
        }?>
        <fieldset>
            <input  type=text name="query" placeholder="Enter Your Query Here" tabindex="1" required autofocus>
        </fieldset>
        <button name="submit" type="submit" value="Submit">Submit</button>
    </form>
    </div>

<button id="ac-large3" class="accordion">Queries:</b>Click to Expand</button>
<div id="panel-large2" class="panel-hidden">

    <button class="accordion">Query 1: List system admins and configuration items</button>
    <div class="panel-hidden">
        <?php
        include("query1.php");
        ?>
    </div>

    <button class="accordion">Query 2</a>: List dependent configuration items for a given configuration item (Physical Server with id:'super-server')</button>
    <div class="panel-hidden">
        <?php
        include("query2.php");
        ?>
    </div>

    <button class="accordion">Query3: List down-app dependencies, time stamps, and system admins (WebAppFireWall with id:'down-app')</button>
    <div class="panel-hidden">
        <?php
        include("query3.php");
        ?>
    </div>

    <button class="accordion">Query 4: List configuration items by type</button>
    <div class="panel-hidden">
        <?php
        include("query4.php");
        ?>
    </div>

    <button class="accordion">Query 5: List configuration items that a given configuration item depends on</button>
    <div id="panel5" class="panel-hidden">
        <form id="activity5" METHOD=POST ACTION="">
            <?php
            if (isset($_POST["query5"])) {
                echo"<hr>Query entered: </br>Type: ".$_POST["types5"].":ID: ".$_POST["query5"]."<hr>";
                include("query5.php");
                echo"</br>";
                echo"<script type=\"text/javascript\">
                    var panel = document.getElementById('panel5');
                panel.style.display = \"block\";
                var panel = document.getElementById('panel-large2');
                panel.style.display = \"block\";
                </script>";
                unset($_POST["query5"]);
                unset($_POST["types5"]);
            }?>
            <fieldset>
                <select id="q5" name = types5>
                    <option style="display:none" disabled selected value style="color:gray"> -- select an CI type -- </option>
                    <option value="datacenter">datacenter</option>
                    <option value="SAN">SAN</option>
                    <option value="physicalserver">physicalServer</option>
                    <option value="virtualserver">VirtualServer</option>
                    <option value="database">Database</option>
                    <option value="dockerswarm">dockerswarm</option>
                    <option value="webappfirewall">webappfirewall</option>
                    <option value="loadbalancer">loadbalancer</option>
                </select>
            </fieldset>
            <fieldset>
                <input  type=text name="query5" placeholder="Enter CI id" tabindex="1" required autofocus>
            </fieldset>
            <button name="submit" type="submit" value="Submit">Submit</button>
        </form>
    </div>
    <button class="accordion">Query 6: List configuration items that depend on a given configuration item </button>
    <div id="panel6" class="panel-hidden">
        <form id="activity6" METHOD=POST ACTION="">
            <?php
            if (isset($_POST["query6"])) {
                echo"<hr>Query entered: </br>Type: ".$_POST["types6"].":ID: ".$_POST["query6"]."<hr>";
                include("query6.php");
                echo"</br>";
                echo"<script type=\"text/javascript\">
                    var panel = document.getElementById('panel6');
                panel.style.display = \"block\";
                var panel = document.getElementById('panel-large2');
                panel.style.display = \"block\";
                </script>";
                unset($_POST["query6"]);
                unset($_POST["types6"]);
            }?>
            <fieldset>
                <select id="q6" name = types6>
                    <option style="display:none" disabled selected value style="color:gray"> -- select an CI type -- </option>
                    <option value="datacenter">datacenter</option>
                    <option value="SAN">SAN</option>
                    <option value="physicalserver">physicalServer</option>
                    <option value="virtualserver">VirtualServer</option>
                    <option value="database">Database</option>
                    <option value="dockerswarm">dockerswarm</option>
                    <option value="webappfirewall">webappfirewall</option>
                    <option value="loadbalancer">loadbalancer</option>
                </select>
            </fieldset>
            <fieldset>
                <input  type=text name="query6" placeholder="Enter CI id" tabindex="1" required autofocus>
            </fieldset>
            <button name="submit" type="submit" value="Submit">Submit</button>
        </form>
    </div>
    <button class="accordion">Query 7: Date, configuration item and summary of all recent changes ordered by date</button>
    <div class="panel-hidden">
        <?php
        include("query7.php");
        ?>
    </div>
    <button class="accordion">Query 8: Update the configuration item to set its system administrator</button>
    <div id="panel8" class="panel-hidden">
        <form id="activity8" METHOD=POST ACTION="">
            <?php
            if (isset($_POST["query8"])) {
                echo"<hr>Query entered: </br>Type: ".$_POST["types8"].":ID: ".$_POST["query8"]."<hr>";
                include("query8.php");
                echo"</br>";
                echo"<script type=\"text/javascript\">
                    var panel = document.getElementById('panel8');
                panel.style.display = \"block\";
                var panel = document.getElementById('panel-large2');
                panel.style.display = \"block\";
                </script>";
                unset($_POST["query8"]);
                unset($_POST["types8"]);
            }?>
            <fieldset>
                <select id="q8" name = types8>
                    <option style="display:none" disabled selected value style="color:gray"> -- select an CI type -- </option>
                    <option value="datacenter">datacenter</option>
                    <option value="SAN">SAN</option>
                    <option value="physicalserver">physicalServer</option>
                    <option value="virtualserver">VirtualServer</option>
                    <option value="database">Database</option>
                    <option value="dockerswarm">dockerswarm</option>
                    <option value="webappfirewall">webappfirewall</option>
                    <option value="loadbalancer">loadbalancer</option>
                </select>
            </fieldset>
            <fieldset>
                <input  type=text name="query8" placeholder="Enter CI id" tabindex="1" required autofocus>
            </fieldset>
            <fieldset>
                <input  type=text name="admin8" placeholder="Enter admin id" tabindex="1" required autofocus>
            </fieldset>
            <button name="submit" type="submit" value="Submit">Submit</button>
        </form>
    </div>

</body>
</html>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;
    var listener;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
        if(acc[i]==document.getElementById('ac-large2')){
            listener=this;
        }
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

function toggle2() {
    var button = document.getElementById('ac-large2');
    listener.classList.toggle("active");
    /* Toggle between hiding and showing the active panel */
    var panel = document.getElementById('panel2');
        panel.style.display = "block";
}

    $(document).ready(function() {
        $('table.display').DataTable();
    } );
</script>
