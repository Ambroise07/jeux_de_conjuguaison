<?php 

use Synext\Helpers\Html;
use Synext\Helpers\Session;

Session::checkSession();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/vendor/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/css/app.css">
    <?php if(isset($css)):?>
    <?php foreach($css as $cs) :?>
    <?=$cs;?>
    <?php endforeach;?>
    <?php endif;?>

    <?= $header ??'';?>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <div class="container">
            <a class="navbar-brand" style="font-size: 1rem;" href="/"><img src="/storages/imgs/linux.png"
                    style="height: 40px;" alt="coins electron">Jeux De Conjuguaison </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <?php if(Session::checkSessionVariable('Auth')) :?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mes Niveaux
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="<?= $router->url('User#Level1');?>">Niveau 1</a>
                            <a class="dropdown-item" href="<?= $router->url('User#Level2');?>">Niveau 2</a>
                            <a class="dropdown-item" href="<?= $router->url('User#Level3');?>">Niveau 3</a>
                        </div>
                    </li>
                    <!-- <? //=Html::navbaractive('Mon compte',$router->url('User#Account'),'user');?> -->
                    <li class="nav-item ">
                        <span class="nav-link text-white btn btn-danger" id="logout" >Se Déconnecter </span>
                    </li>
                    <?php else : ?>
                    <?=Html::navbaractive('Connexion',$router->url('User#Login'),'sign-in');?>
                    <?=Html::navbaractive('Inscription',$router->url('User#Register'),'home');?>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
    <?=$contents;?>
    <footer class="container-fluid  bg-dark py-2 text-white fixed-bottom">
        <section class="py-3">
            <div class="row">
                <section class="col-12">
                    <p class=" text-center"> © <?=date("Y")?> Copyright By tout droits réservés </p>
                </section>
            </div>
        </section>
    </footer>
    <script src="/vendor/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="/vendor/js/app.js"></script>
    <?php if(isset($scripts)):?>
    <?php foreach($scripts as $script) :?>
    <?=$script;?>
    <?php endforeach;?>
    <?php endif;?>
</body>

</html>