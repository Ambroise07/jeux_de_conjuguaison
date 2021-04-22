<?php

use Synext\Helpers\Json;
use Synext\Helpers\Session;
Session::checkSession();

if(isset($_SESSION['Auth'])){
    Session::destroy('Auth');
    Session::destroy('player');
    echo Json::message(false);
}
