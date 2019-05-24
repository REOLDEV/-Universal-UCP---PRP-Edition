<?php
SESSION_START();
if(!isset($_SESSION["uid"])) {
    header("Location: login");
}
	
define('allowed', true);
require_once "config/datenbank.php";
require_once "config/allgemein.php";
require_once "system/api.php";

if(!isset($_GET["page"])) {
    header("Location: index.php?page=dashboard");
}
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/bootadmin.css">

    <title><?= $ucp_config["servername"]; ?></title>
</head>
<body class="bg-light">

<nav class="navbar navbar-expand navbar-dark bg-primary">
    <a class="sidebar-toggle mr-3" href="#"><i class="fa fa-bars"></i></a>
    <a class="navbar-brand" href="#"><?= $ucp_config["servername"]; ?></a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
        <!--
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-envelope"></i> 5</a></li>
            <li class="nav-item"><a href="#" class="nav-link"><i class="fa fa-bell"></i> 3</a></li>
        -->
            <li class="nav-item dropdown">
                <a href="#" id="dd_user" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo getName($_SESSION["uid"]); ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd_user">
                    <a href="index.php?page=meinprofil" class="dropdown-item">Mein Profil</a>
                    <a href="login" class="dropdown-item">Ausloggen</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<?php include "module/sidebar.php"; ?>
<?php if($_GET["page"] == "dashboard") {
    include "module/dashboard.php";
} else if($_GET["page"] == "meinprofil") {
    include "module/meinprofil.php";
} else if($_GET["page"] == "zugriffverweigert") {
    include "module/zugriffverweigert.php";  
} else {
    include "module/404.php";
} ?>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootadmin.min.js"></script>

</body>
</html>