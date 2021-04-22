<?php

use Synext\Helpers\Session;
use Synext\Components\Auths\Auth;
use Synext\Controllers\Jeux;
Session::checkSession();
Auth::isConnect($router) ;
$id = (int)$_SESSION['Auth'];
$jeux = (New Jeux);
$niveaux = $jeux->getNiveaux($id);
$niveau_1 = (int)$niveaux->niveau_1;
$niveau_2 = (int)$niveaux->niveau_2;
$points = (int)$niveaux->niveau_3;
$NIVEAU= " NIVEAU III";
$verbes = $jeux->getVerbe(3);
$ESSAI = $jeux->getNiveaux($id)->essai;
$niv = 3

?>
<div class="container pt-2 " style="margin-bottom: 95px;">
    <form class="row" action="" id="conjuguer" method="post">
        <?php if($niveau_1 != 30 || $niveau_2 != 30):?>
            <div class="col-md-12 text-center mt-2">
                <div class="card alert alert-danger">
                    <div class="card-body ">
                        <h1>VOUS DEVEZ TERMINER  LE NIVEAU 1 & 2 D'ABORD</h1>
                    </div>
                </div>
            </div>
        <?php elseif($points == 30):?>
            <div class="col-md-12 text-center mt-2">
                <div class="card alert alert-success">
                    <div class="card-body ">
                        <h1>VOUS AVEZ TERMINER  LE NIVEAU 3</h1>
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