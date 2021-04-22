<?php
use Synext\Controllers\UserControllers;
$title = "Page D'inscription";
$register = (new UserControllers)->register($router);
$errors_register = $register[0];
$create_account = $register[1];
$form = $register[2];
$message = $register[3];
?>
<div class="container pt-2">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
            <h2 class="text-left text-white">Interface d'inscription </h2>
            <?php if($errors_register):?>
                <div class="alert alert-danger"><?=$message;?></div>
            <?php endif;?>
            <?php if($create_account):?>
                <div class="alert alert-success">Votre compte est pret  <a href="/user/login">Connecter vous</a></div>
            <?php endif;?>
            <div class="card mt-3 mb-2">
                <div class="card-body">
                        <form action="" method="post">
                            <div class="form-row">
                                <?=$form->input('username','Pseudo');?>
                                <?=$form->input('email','Votre adresse mail','email');?>
                            </div>
                            <div class="form-row">
                                <?=$form->input('password','Entrer votre mot de passe ','password');?>
                                <?=$form->input('c_password','Confirmer le mot de passe ','password');?>
                            </div>
                            
                            <?= $form->checkbox('terms-conditions','J\accepte les termes et conditions ')?>
                            <button type="submit" class="btn btn-primary btn-block">S'enregistrer</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>