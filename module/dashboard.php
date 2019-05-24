<?php
if (!defined('allowed')) {
    header("Location: ../index.php?page=zugriffverweigert");
}
?>
<div class="content p-4">
    <h2 class="mb-4">Dashboard</h2>
    <div class="row">
        <div class="col-md-6">
            <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#changelog" role="tab">Changelog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#servernews" role="tab">Server Nachrichten</a>
            </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="changelog" role="tabpanel">
                <div class="accordion" id="changelog">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Forum
                            </button>
                        </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#changelog">
                        <div class="card-body">
                            <?php echo ladeChangelog("forum"); ?>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Gameserver
                            </button>
                        </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#changelog">
                        <div class="card-body">
                            <?php echo ladeChangelog("gameserver"); ?>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Teamspeak
                            </button>
                        </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#changelog">
                        <div class="card-body">
                            <?php echo ladeChangelog("teamspeak"); ?>
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingFour">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            User Control Panel
                            </button>
                        </h5>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#changelog">
                        <div class="card-body">
                            <?php echo ladeChangelog("ucp"); ?>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="tab-pane" id="servernews" role="tabpanel"><?php echo ladeServerNews(); ?></div>
            </div>
        </div>
    </div>
</div>



</div>