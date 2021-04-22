<?php

use Synext\Controllers\UserControllers;
$title = "Page De connection";

$userController = (new UserControllers)->login($router,$_POST);
$errors_login = $userController[0];
$form = $userController[1];
$message = $userController[2];
?>


<div class="container pt-2">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
        <h2 class="text-left text-white">Interface de connexion </h2>
            <?php if($errors_login):?>
                <div class="alert alert-danger"><?=$message?></div>
            <?php endif;?>

            <div class="card mt-3 mb-2">
                <div class="card-body">
                        <form action="" method="post">
                        <div class="form-row">
                            <?=$form->input('email','Votre adresse mail','email');?>
                            <?=$form->input('password','Votre mot de passe ','password');?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>