<?php 
namespace Synext\Helpers;

use Exception;

class Helpers{

    public static function checkFile($file_name){
        $file_size_max = 3097152;
        $file_type = ['jpg', 'png', 'jpeg'];
        $file_info = $_FILES[$file_name];
        $file_ext = strtolower(substr(strchr($file_info['name'], '.'), 1));
        if($file_info['size'] <= $file_size_max) {
            if (in_array($file_ext, $file_type)) {
                return $file_ext;
            }
        }
        return false;
    }
    public static function uploadFile($file_name,$path){
        $file_info = $_FILES[$file_name];
        if(!file_exists($path)){
            try{
                move_uploaded_file($file_info['tmp_name'], $path);
                return true;
            }catch(Exception $e){
                //
            }
        }
    }
    public static function getExtrait(string $content, int $limit = 12)
    {
        if (strlen($content) <= $limit) {
            return $content;
        }

        return substr($content, 0, $limit).'..';
    }
    public static function formatPrice( $price, string $currency): string
    {
        return $currency.number_format($price, 2, ',', ',');
    }
    public static function getInt(string $name, int $default = null): ?int
    {
        if (!isset($_GET[$name])) {
            return $default;
        }
        if ($_GET[$name] === '0') {
            return 0;
        }
        if (!filter_var($_GET[$name], FILTER_VALIDATE_INT)) {
           
           //DD( $_SERVER);
           #throw new \Exception('Error bad params');
           $uri = explode('=',$_SERVER['REQUEST_URI'])[0]."=1";
           $url = $_SERVER['HTTP_HOST'].$uri[0]."=1";
           //dd($url);
            Redirect::to($uri);
        }

        return (int) $_GET[$name];
    }
    public static function getPositiveInt(string $name, int $pages, int $default = null): ?int
    {
        $param = self::getInt($name, $default);
        if (($param !== null && $param > $pages) || $param < 1) {
            throw new \Exception("erreur ça n'existe pas cette page");
        }

        return $param;
    }

}

