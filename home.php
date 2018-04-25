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
    <div class="panel-hidden">
    <form id="activity" METHOD=POST ACTION="query.php">
        <fieldset>
            <input  type=text name="query" placeholder="Enter Your Query Here" tabindex="1" required autofocus>
        </fieldset>
        <button name="submit" type="submit" value="Submit">Submit</button>
    </form>
    </div>

<button id="ac-large3" class="accordion">Queries:</b>Click to Expand</button>
<div id="panel-large" class="panel-hidden">

    <button class="accordion">Query 1: List system admins and configuration items</button>
    <div class="panel-hidden">
        <?php
        include("query1.php");
        ?>
    </div>

    <button class="accordion">Query 2</a>: List dependent configuration items for a given configuration item</button>
    <div class="panel-hidden">
        <?php
        include("query2.php");
        ?>
    </div>

    <button class="accordion">Query3: List down-app dependencies, time stamps, and system admins responsible for change</button>
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
    <div class="panel-hidden">
        <?php
        include("query5.php");
        ?>
    </div>
    <button class="accordion">Query 6: List the date, configuration item, and summary of all recent changes ordered by date</button>
    <div class="panel-hidden">
        <?php
        include("query6.php");
        ?>
    </div>
    <button class="accordion">Query 7: Update a given configuration item to have a given system administrator</button>
    <div class="panel-hidden">
        <?php
        include("query7.php");
        ?>
    </div>

</body>
</html>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function () {
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

    $(document).ready(function() {
        $('table.display').DataTable();
    } );
</script>
