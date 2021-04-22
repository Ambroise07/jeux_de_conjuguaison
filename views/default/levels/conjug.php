<?php

$pronoms = [
    'JE','TU','IL/ELLE','NOUS','VOUS','ILS/ELLES'
];
$pronom = $pronoms[array_rand($pronoms)];
;?>

<div class="card my-4">
    <h5 class="card-header">CONJUGUAISON</h5>
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-12">
                <label for="conjuger" class=" badge badge-warning p-3">Conjuger le verbe avec le pronom personel</label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" data-pronom="<?= $pronom;?>" id="pronom"><?= $pronom;?></span>
                </div>
                <input  type="text" id="conjuger" value="" name="conjuger" class="form-control "
                    placeholder="Entrer le verbe conjuguer" required>
            </div>
            <button type="submit"  class="btn btn-primary btn-block mt-1">Envoyez</button>
        </div>

    </div>

</div>