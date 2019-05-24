<?php
SESSION_START();

if(isset($_SESSION["uid"])) {
    session_destroy();
}
require_once "../config/datenbank.php";
require_once "../config/allgemein.php";
require_once "../system/api.php";

//LOGIN
if(isset($_POST["login-btn"])) {
    $uname = mysqli_escape_string($db, $_POST["login-uname"]);
    $pw = md5(mysqli_escape_string($db, $_POST["login-pw"]));
    $loginsql = "SELECT `Name`, `Passwort`, `id` FROM spieler WHERE `Name` = '" .$uname. "'";
    $loginquery = mysqli_query($db, $loginsql);
    $result = mysqli_fetch_array($loginquery);

    if($result["Passwort"] == $pw) {
        $_SESSION["uid"] = $result["id"];
        header("Location: ../index.php");
    } else {
        header("Location: index.php?failed=1");
    }
}
?>

<!doctype html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../css/fontawesome-all.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <link rel="stylesheet" href="../css/fullcalendar.min.css">
    <link rel="stylesheet" href="../css/bootadmin.min.css">

    <title>Login | <?php echo $ucp_config["servername"]; ?></title>
</head>
<body class="bg-light">

        <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <h1 class="text-center mb-4"><?php echo $ucp_config["servername"]; ?></h1>
                <div class="card">
                    <div class="card-body">
                        <form name="login-form" method="POST">
                        <?php if(isset($_GET["failed"])) { ?>
                            <div class="mb-3">
                                <div class="alert alert-danger" role="alert">
                                    <strong>Fehler</strong> Nutzername oder Passwort falsch!
                                </div>
                            </div>
                        <?php } ?>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input name="login-uname"  type="text" class="form-control" placeholder="Benutzername" required>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-key"></i></span>
                                </div>
                                <input name="login-pw"  type="password" class="form-control" placeholder="Passwort" required>
                            </div>

                            <div class="row">
                                <div class="col pr-3">
                                    <button type="submit" name="login-btn" class="btn btn-block btn-primary">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/datatables.min.js"></script>
<script src="../js/moment.min.js"></script>
<script src="../js/fullcalendar.min.js"></script>
<script src="../js/bootadmin.min.js"></script>

</body>
</html>