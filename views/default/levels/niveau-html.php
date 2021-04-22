<div class="card mt-3">
    <div class="card-body">
        <h4 class="text-center badge badge-info mt-2 p-2" id="niv" data-niv="<?=$niv;?>"><?= $NIVEAU; ?></h4>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Essai
                <span class="badge badge-success badge-pill" id='essai'> <?=$ESSAI;?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Total Points
                <span class="badge badge-success badge-pill" id="point"> <?= $points; ?> </span>
            </li>
        </ul>
    </div>
</div>