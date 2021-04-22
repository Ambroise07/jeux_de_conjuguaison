<?php

use Synext\Controllers\Jeux;
use Synext\Helpers\Json;
use Synext\Helpers\Session;
use Synext\Requests\Http;
Session::checkSession();
if(Http::methods('POST')){
    if(!Session::checkSessionVariable('Auth')){
        echo Json::message(true,'Vous n\'êtes pas connecté '); 
        exit;
    }
    $user_id = $_SESSION['Auth'];
    $data = Http::input();
    $niv = $data['niv'];
    $verbe = htmlentities($data['verbe']);
    $temp = htmlentities($data['temps']);//int
    $conjuger = $data['conjuger'];
    $pronom = explode('/',$data['pronom']);
    $pronom = $pronom[0] ? $pronom[0]:$pronom[1];
    if(in_array($verbe[0],['a','e','i','o','u','y'])){
        $pronom = "j'";
    }
    $response = false;
    if(!empty($verbe) && !empty($temp) && !empty($conjuger)){
        $jeux = new Jeux();
        $tempsmode = $jeux->getTempsModeBynumero((int)$temp);
        $mode = $tempsmode['mode'];
        $temps = $tempsmode['temps'];
        $translate = $jeux->traduction($mode,$temps);

       $url = $jeux->returnApiValideLInk($verbe,$translate);
       $data = json_decode(file_get_contents($url));
       if($data->exit_code === 0){
           $datas = $data->conjugation;
            foreach($datas as $data){
                if($data->verb === $conjuger && $data->pronoun === $pronom){
                    $response = true;
                } 
            }
            if($response){
                $points = $jeux->pointGagner($user_id,$niv);
                if($points === 30){
                    echo Json::message(false,"VOUS AVEZ TERMINEZ LE  NIVEAU $niv !",['point'=>$points]); 
                    exit;
                }
                echo Json::message(false,"Vous avez trouvé la bonne réponse",['point'=>$points]); 
                exit;
            }else{
                $essai = $jeux->EssaiJeux($user_id);
                if($essai === 0){
                    $essai = $jeux->EssaiInitial($user_id);
                    echo Json::message(true,"VOUS AVEZ PERDU ! JOUER ENCORS",['essai'=>$essai]); 
                    exit;
                }
                echo Json::message(true,"Mauvaise réponse !",['essai'=>$essai]); 
                exit;
            };
           
       }else{
        echo Json::message(true,"Une erreur innatendue ! Réessayez"); 
        exit;
       }
      
    }else{
        echo Json::message(true,"Remplissez tous les champs"); 
        exit;
    }
}
