<div class="card my-4">
    <h5 class="card-header">LES VERBES </h5>
    <div class="card-body" style="padding-top: 0px;">
        <?php foreach($verbes as $verbe):?>
            <div class="custom-control custom-radio">
                <input type="radio" id="<?=$verbe->verbe;?>" name="verbe" value="<?=$verbe->verbe;?>" class="custom-control-input">
                <label class="custom-control-label" for="<?=$verbe->verbe;?>"><?=$verbe->verbe;?></label>
            </div>
        <?php endforeach;?>

    </div>

</div>