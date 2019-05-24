<?php
//require_once "../config/datanbank.php";

function ladeChangelog($category) {
    global $db;
    $sql = "SELECT * FROM changelog WHERE category = '" .$category. "'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_array($query);
    //return $result["text"];
    return '<font class="text-muted"> Geschrieben von ' . getName($result["verfasser"]). " am " .convertToNormalDatumMitUhrzeit($result["timestamp"]). "</font><br><br>" .$result["text"];
}

function ladeServerNews() {
    global $db;
    $sql = "SELECT * FROM servernews";
    $query = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($query))
    {
        if($row["level"] == "0") {
            echo '<div class="alert alert-primary" role="alert">' .$row["text"]. '</div>';
        } else if($row["level"] == "1") {
            echo '<div class="alert alert-warning" role="alert">' .$row["text"]. '</div>';
        } else if($row["level"] == "2") {
            echo '<div class="alert alert-danger" role="alert">' .$row["text"]. '</div>';
        }
    }
}

//Spieler Funktionen

//Gibt den Spielernamen aus
function getName($id) {
    global $db;
    $sql = "SELECT `name` FROM spieler WHERE id = '" .$id. "'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_array($query);
    return $result["name"];
}

//Gibt den Adminrang eines Spielers aus
function getAdminRang($id) {
    global $db;
    $sql = "SELECT `Admin` FROM spieler WHERE id = '" .$id. "'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_array($query);
    return $result["Admin"];
}

//Prüft ob der Rang ein Adminrang ist
function isAdmin($rang) {
    if($rang > 0) {
        return true;
    }
    if($rang == "-1") {
        return true;
    }
    if($rang == "0") {
        return false;
    }
}

//Gibt die SkinID des Spieler's aus.
function getSkinID($id) {
    global $db;
    $sql = "SELECT `SkinID` FROM spieler WHERE id = '" .$id. "'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_array($query);
    return $result["SkinID"]+1;
}

//Gibt den Level des Spieler's aus.
function getLevel($id) {
    global $db;
    $sql = "SELECT `Level` FROM spieler WHERE id = '" .$id. "'";
    $query = mysqli_query($db, $sql);
    $result = mysqli_fetch_array($query);
    return $result["Level"];
}

//Mir viel kein kürzerer Name dafür ein
function convertToNormalDatumMitUhrzeit($datum) {
    return gmdate("d.m.Y", strtotime($datum)) ." um ". gmdate("H:i", strtotime($datum));
}
?>