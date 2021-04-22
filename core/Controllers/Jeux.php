<?php
namespace Synext\Controllers;

use Exception;
use Synext\Components\Databases\Database;
use Synext\Helpers\Session;

class Jeux{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getNiveaux($id){
        return $this->db->select("SELECT * FROM niveaux WHERE id_user=:id",false,['id'=>$id]);
    }
    public function progress($user_id){
        $progress = 0;
        $sum = $this->db->select("SELECT niveau_1,niveau_2,niveau_3  FROM niveaux WHERE id_user=:id",false,['id'=>$user_id]);
        $progress += (int)$sum->niveau_1;
        $progress += (int)$sum->niveau_2;
        $progress += (int)$sum->niveau_3;
        return $progress;
    }
    public function niveauToSession($user_id){
        Session::checkSession();
        $niveaux = $this->getNiveaux($user_id);
        if(!Session::checkSessionVariable('player')){
        $_SESSION['player']=[];
        $_SESSION['player'][$user_id] = [
            'niveaux' => [
                1=>(int)$niveaux->niveau_1,
                2=>(int)$niveaux->niveau_2,
                3=>(int)$niveaux->niveau_3,
            ]
        ];
        }
    }

    public function getVerbe(int $groupe){
        return $this->db->select("SELECT verbes.id,verbes.verbe FROM verbes JOIN verbe_groups ON verbes.id= verbe_groups.id_verbes WHERE verbe_groups.id_groupes=:groupe",true,['groupe'=>$groupe]);
    }

    public function getTempsModeBynumero(int $numero):array{
        $modetemps = [
            "indicatif"=>[
                1 => 'présent',
                5 => 'passé-composé',
                2 => 'imparfait',
                7 => 'plus-que-parfait',
                3 => 'futur',
                6 => 'futur-antérieur',
                4 => 'passé-simple',
                8 => 'passé-antérieur',
            ],
            "impératif"=>[
                9=>'présent-imp',
                18=>'passé-imp'
            ],
            "subjonctif"=>[
                10=>'présent',
                11=>'passé-sub',
                16=>'imparfait',
                17=>'plus-que-parfait-sub',
            ],
            "conditionnel"=>[
                14=>'présent',
                15=>'passé-1',
            ],
            "participe"=>[
                20=>'présent-part',
                21=>'passé-part',
            ],
            // "gérondif"=>[
            //     22=>'présent',
            //     23=>'passé',
            // ]
        ];
        foreach($modetemps as $modes => $tempskey){

            foreach($tempskey as $key => $temp){
                if($key === $numero){
                    return ['mode'=>$modes,'temps'=>$temp];
                }
            }

        }
    }

    public function traduction($mode,$temps):array{

        $tableauxModes = [
           'indicatif' =>  'indicative',
             'conditionnel' => 'conditional',
             'subjonctif' => 'subjunctive',
            'participe' =>  'participle',
             'impératif' =>'imperative'
        ];
        $tableauTemps = [
            'present'=> 'présent',
            'imperfect'=> 'imparfait',
            'future'=> 'futur',
            'simple-past'=> 'passé-simple',
            'perfect-tense'=> 'passé-composé',
            'pluperfect'=> 'plus-que-parfait',
            'anterior-past'=> 'passé-antérieur',
            'anterior-future'=> 'futur-antérieur',
            'conditional-past'=> 'passé-1',
           ' subjunctive-past'=> 'passé-sub',
            'subjunctive-pluperfect'=> 'plus-que-parfait-sub',
            'imperative-present'=> 'présent-imp',
            'imperative-past'=> 'passé-imp',
            'present-participle' => 'présent-part',
            'past-participle' => 'passé-part'
        ];
        return ['mode'=>$tableauxModes[$mode],'tense'=>array_search($temps,$tableauTemps,true)];
    }
    public function returnApiValideLInk($verbe,$translate){
        return "https://lordmorgoth.net/APIs/conjugation/conjugate?verb={$verbe}&mode={$translate['mode']}&tense={$translate['tense']}";
    }
    public function pointGagner($id,$niveaux){
        if($niveaux === 1){
            $niveau_ = "niveau_1";
        }elseif($niveaux === 2){
            $niveau_ = "niveau_2";

        }elseif($niveaux === 3){
            $niveau_ = "niveau_3";

        }else{
            throw New Exception("niveau inconnu");
        }

        $Level = (int)$this->db->select("SELECT $niveau_ FROM niveaux WHERE id_user=:id",false,['id'=>$id])->$niveau_;
        if($Level === 30){
            $Level = 30;
            return $Level;
        }else{
            $Level += 3;
        }
        $this->db->update("UPDATE `niveaux` SET $niveau_ = $Level WHERE id_user = :id",['id'=>$id]);
        return $Level;
    }
    public function EssaiJeux($id){
        $essai = (int)$this->db->select("SELECT essai FROM niveaux WHERE id_user=:id",false,['id'=>$id])->essai;
        $essai -= 1;
        $this->db->update("UPDATE `niveaux` SET essai = $essai  WHERE id_user = :id",['id'=>$id]);
        return $essai;
    }
    public function EssaiInitial($id){
        $essai = 3;
        $this->db->update("UPDATE `niveaux` SET essai = $essai  WHERE id_user = :id",['id'=>$id]);
        return $essai;
    }
}