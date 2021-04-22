<?php

///use Synext\Components\Databases\DatabaseManager;
use Synext\Routers\Router;

require '../vendor/autoload.php';
/** Error handler */
//(new \Whoops\Run())->pushHandler(new \Whoops\Handler\PrettyPageHandler())->register();
//(new DatabaseManager);
/**public folder */
$public_paths = DIRECTORY_SEPARATOR.basename($_SERVER['DOCUMENT_ROOT']);
/** global views paths */
$view_paths = DIRECTORY_SEPARATOR.dirname($_SERVER['DOCUMENT_ROOT']).DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR;

/** Router  */
$router = new Router($view_paths,$public_paths);
    $router

    ->getPost('/','default/users/login','home')

    //AJAX REQUEST JEUX 
    ->resource([
            ['POST','/jeux/donne','ajaxs/jeux/index'],
            //['POST','/request/token-satus','ajaxs/tokens/token_status'],
 

    ])

    //USER RESSOURCES 
    ->get('/user/account','default/users/index' ,'User#Account')
    ->getPost('/user/account/level-1','default/levels/index' ,'User#Level1')
    ->getPost('/user/account/level-2','default/levels/index-2' ,'User#Level2')
    ->getPost('/user/account/level-3','default/levels/index-3' ,'User#Level3')
    ->getPost('/user/login','default/users/login' ,'User#Login')
    ->getPost('/user/register','default/users/register' ,'User#Register')
    ->get('/user/logout','ajaxs/users/logout' ,'User#Logout')
    ->get('/user/test','default/users/test' )

    ->run();
