<?php

use Synext\Models\Users;
use Synext\Helpers\Session;
use Synext\Components\Auths\Auth;
use Synext\Components\Htmls\Form;
use Synext\Controllers\Jeux;

Session::checkSession();
Auth::isConnect($router) ;
$id = (int)$_SESSION['Auth'];
$db = (new Users);
$user = $db->findWhereId('users',$id)[0];
$jeux = (New Jeux);
$jeux->niveauToSession($id);
$niveaux = $jeux->getNiveaux($id);
$tt = 115;
$progresse = floor(($jeux->progress($id)*$tt)/100);

$form = new Form([],[])
?>
<div class="container pt-2">
    <div class="row">
        <div class="container">
            <div class="main-body">
                <div class="row ">
                    <div class="col-md-4 col-lg-3 col-6">
                        <div class="card shadow">
                            <div class="card-body ">
                                <h4 class="text-center badge badge-info mt-2 p-2">BILAN</h4>
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        NIVEAU I
                                        <span class="badge badge-success badge-pill"><?=$niveaux->niveau_1 > 1 ? $niveaux->niveau_1.' Points': $niveaux->niveau_1.' Point';?> </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        NIVEAU II
                                        <span class="badge badge-success badge-pill"> <?=$niveaux->niveau_2 > 1 ? $niveaux->niveau_2.' Points': $niveaux->niveau_2.' Point';?> </span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        NIVEAU III
                                        <span class="badge badge-success badge-pill"><?= $niveaux->niveau_3 > 1 ? $niveaux->niveau_3.' Points': $niveaux->niveau_3.' Point';?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="container  mb-5">
                            <div class="main-body">
                                <!-- Breadcrumb -->
                                <nav aria-label="breadcrumb" class="main-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?=$router->url("home");?>">Compte</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Mon Profile</li>
                                    </ol>
                                </nav>
                                <!-- /Breadcrumb -->
                                <div class="row ">
                                    <div class="col-md-4 mb-5">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                        alt="Admin" class="rounded-circle" width="150">
                                                    <div class="mt-3">
                                                        <p class="text-secondary mb-1">JOUEUR</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-8">
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Nom </h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary"> <?=$user->username;?> </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0">Email</h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary"><?=$user->email;?> </div>
                                                </div>
                                            
                                            </div>
                                        </div>
                                        <div class="row gutters-sm">
                                            <div class="col-sm-12 mb-3">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h6 class="d-flex align-items-center mb-3">Progression </h6>
                                                        <div class="progress mb-3" style="height: 5px">
                                                            <div class="progress-bar bg-primary" role="progressbar"
                                                                style="width: <?=$progresse ;?>%" ></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row.// -->
</div>

<?php $scripts = ['<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>'];?>