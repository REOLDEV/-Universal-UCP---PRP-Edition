<?php
if (!defined('allowed')) {
    header("Location: ../index.php?page=zugriffverweigert");
}
?>

<div class="d-flex">
    <div class="sidebar sidebar-dark bg-dark">
        <ul class="list-unstyled">
            <li <?php if($_GET["page"] == "dashboard") { echo 'class="active"'; } ?>><a href="index.php?page=dashboard"><i class="fa fa-fw fa-home"></i> Dashboard</a></li>
            <li <?php if($_GET["page"] == "meinprofil") { echo 'class="active"'; } ?>>
                <a href="#sm_expand_1" data-toggle="collapse">
                    <i class="fa fa-user"></i> Mein Account
                </a>
                <ul id="sm_expand_1" class="list-unstyled collapse">
                    <li <?php if($_GET["page"] == "meinprofil") { echo 'class="active"'; } ?>><a href="index.php?page=meinprofil">Mein Profil</a></li>
                    <li><a href="#">Meine Fahrzeuge</a></li>
                </ul>
            </li>
            <li <?php if($_GET["page"] == "1") { echo 'class="active"'; } ?>><a href="#"><i class="fa fa-fw fas fa-euro-sign"></i> Online Banking</a></li>
            <li <?php if($_GET["page"] == "2") { echo 'class="active"'; } ?>><a href="#"><i class="fa fa-fw far fa-building"></i> Meine Fraktion</a></li>
            <li <?php if($_GET["page"] == "3") { echo 'class="active"'; } ?>><a href="#"><i class="fa fa-fw fas fa-industry"></i> Meine Businesse</a></li>
        </ul>
    </div>