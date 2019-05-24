<?php
if (!defined('allowed')) {
    header("Location: ../index.php?page=zugriffverweigert");
}

$pinnwandSQL = "SELECT * FROM pinnwand WHERE targetuser = '" .$_SESSION['uid']. "'";
$pinnwandQuery = mysqli_query($db, $pinnwandSQL);

if(isset($_POST["newcommentbtn"])) {
    $text = mysqli_escape_string($db, $_POST["newcommentinput"]);
    $targetuser = mysqli_escape_string($db, $_POST["newcommenttargetuser"]);
    $foreignuser = mysqli_escape_string($db, $_POST["newcommentforeignuser"]);
    $insertsql = "INSERT INTO `pinnwand` (`targetuser`, `foreignuser`, `messagetext`) VALUES ( '" .$targetuser. "', '" .$foreignuser. "', '" .$text. "')";
    $query = mysqli_query($db, $insertsql);
    header("Location: index.php?page=meinprofil");
}
?>

<div class="content p-4">
    <h2 class="mb-4">Mein Profil</h2>
        <div class="row">
            <!-- Kleine Profilinfo -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img class="profil-avatar center" src="bilder/skin_avatar/<?php echo getSkinID($_SESSION["uid"]); ?>.png" />
                        <br>
                        <h3><center><?php echo getName($_SESSION["uid"]); ?></center></h3>
                        <?php if(isAdmin(getAdminRang($_SESSION["uid"]))) { ?>
                            <h6><center><span class="badge badge-secondary"><?php echo $adminraenge[getAdminRang($_SESSION["uid"])]; ?></span></center></h6>
                        <?php } ?>
                        <div class="trennlinie"></div>
                        <strong>Level: </strong> <?php echo getLevel($_SESSION["uid"]); ?>
                    </div>
                </div>
            </div>
            <!-- Pinnwand -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="meinProfil" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pinnwand-tab" data-toggle="tab" href="#pinnwand" role="tab" aria-controls="pinnwand" aria-selected="true">Pinnwand</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="meinProfilContent">
                            <div class="tab-pane fade show active" id="pinnwand" role="tabpanel" aria-labelledby="pinnwand-tab">
                            <br>
                                <form name="newcomment" method="post">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <input name="newcommentinput" type="text" class="form-control" name="commentText" placeholder="Kommentar hinterlassen" required/>
                                            <input name="newcommenttargetuser" type="hidden" value="<?php echo $_SESSION["uid"] ?>"/>
                                            <input name="newcommentforeignuser" type="hidden" value="<?php echo $_SESSION["uid"] ?>"/>
                                        </div>
                                        <div class="col-md-2">
                                            <button name="newcommentbtn" style="width: 100%;" type="submit" class="btn btn-success">Senden</button>
                                        </div>
                                    </div><br>
                                    <div class="trennlinie"></div>
                                    <br>
                                </form>
                                <?php while ($row = mysqli_fetch_array($pinnwandQuery)) { ?>
                                    <div class="post">
                                        <div class="user-block">
                                                <table>
                                                    <tr>
                                                        <td><img class="pinnwand-avatar" src="bilder/skin_avatar/<?php echo getSkinID($row["foreignuser"]); ?>.png" alt="Avatar"></td>
                                                        <td>
                                                            <span class="username">
                                                                <?php echo getName($row["foreignuser"]); ?>
                                                            </span>
                                                            <br><small><?php echo convertToNormalDatumMitUhrzeit($row["timestamp"]); ?></small>
                                                        </td>
                                                    </tr>
                                                </table>
                                        </div>
                                        <!-- /.user-block -->
                                        
                                        <p style="font-size: 15px;">
                                        <?php echo $row["messagetext"]; ?>
                                        </p>
                                    </div>
                                    <div class="trennlinie"></div>
                                    <br>
                                    <?php } ?>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>