<?php
if (!defined('allowed')) {
    header("Location: ../index.php?page=zugriffverweigert");
}
?>

<div class="content p-4">
    <h2 class="mb-4">Fehlercode 1001 - Zugriff verweigert</h2>
    <div class="row">
        <div class="col-md-12">
            Du hast keine Berechtigung diese Seite zu öffnen.<br><br>
            <a class="btn btn-primary btn-lg" href="index.php?page=dashboard">Zurück zum Dashboard</a>
        </div>
    </div>
</div>