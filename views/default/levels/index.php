<?php

use Synext\Models\Users;
use Synext\Helpers\Session;
use Synext\Controllers\Jeux;
use Synext\Components\Auths\Auth;
use Synext\Components\Databases\Database;

Session::checkSession();
Auth::isConnect($router) ;
$id = (int)$_SESSION['Auth'];
$user = (new Users)->findWhereId('users',$id)[0];
$pdo = (new Database);
$jeux = (New Jeux);
$points = $jeux->getNiveaux($id)->niveau_1;
$verbes = $jeux->getVerbe(1);
$NIVEAU= " NIVEAU I";
$ESSAI = $jeux->getNiveaux($id)->essai;
$niv = 1
?>
<div class="container " style="margin-bottom: 95px;">
    <form class="row" action="" id="conjuguer" method="post">
        <?php if($points == 30):?>
            <div class="col-md-12 text-center mt-2">
                <div class="card alert alert-success">
                    <div class="card-body ">
                        <h1>VOUS AVEZ TERMINER  LE NIVEAU 1</h1>
                    </div>
                </div>
            </div>
        <?php else :?>
            <?php include 'info-jeux.php';?>
            <div class="col-md-12"> <?php include 'niveau-html.php';?> </div>
            <div class="col-md-3 text-center"> <?php include 'verbes.php';?> </div>
            <div class="col-md-5 text-center"> <?php include 'temps.php';?> </div>
            <div class="col-md-4 text-center"> <?php include 'conjug.php';?> </div>
        <?php endif;?>
    </form>
</div>
<?php include 'modal.php';?>
<?php $scripts = ['<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>'];?>
