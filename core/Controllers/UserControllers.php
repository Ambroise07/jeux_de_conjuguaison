<?php
namespace Synext\Controllers;
use Synext\Models\Users;
use Synext\Helpers\Session;
use Synext\Helpers\Redirect;
use Synext\Components\Htmls\Form;
use Synext\Components\Auths\Login;
use Synext\Components\Auths\Register;
use Synext\Components\Validators\Validator;

class UserControllers{
    private function is_alredy_login($router){
        Session::checkSession();
        if(Session::checkSessionVariable('Auth')){
            return Redirect::to($router->url('User#Account'));
        }
        
    }
    public function login($router,array $post){
        $data = [];
        $errors = [];
        $errors_login = false;
        $message = '';
        $this->is_alredy_login($router);
        if(!empty($post)){
            $validate = new Validator($post);
            $validate->rule('required','email')
                    ->rule('required','password')
                    ->rule('email','email');
            if($validate->is_valide()){
            $email = htmlspecialchars($post['email']);
            $password = htmlspecialchars($post['password']);
            $DB = (new Login);
            $user = $DB->checkUser($email);
            if($user === false){
                $errors_login = true;
                $message .= 'verrifier vos identifiants de connexion';
            }else{
                if(!is_null($user->getToken())){
                    $errors_login = true;
                    $message .= 'verrifier vos identifiants de connexion !';
                }elseif(is_null($user->getPassword())){
                    $password = password_hash($password,PASSWORD_BCRYPT);
                    $DB->db()->update("UPDATE users SET password=:password WHERE id=:id",['password'=>$password,'id'=>$user->getId()]);
                    $DB->connectUser($user->getId(),$router->url('User#Account'));
                }else{
                        if(!password_verify($password,$user->getPassword())){
                            $errors_login = true;
                        }else{
                            $DB->connectUser($user->getId(),$router->url('User#Account'));
                        }
                }
            }
            
            }else{
                $errors = $validate->errors();
            }
            $data = $post;
        }
        $form = new Form($data,$errors);
        return [$errors_login,$form,$message];
    }
    public function register($router){

        
        $data = [];
        $errors = [];
        $errors_register = false;
        $create_account = false;
        $message = '';
        $this->is_alredy_login($router);
        if(!empty($_POST)){
            $validate = new Validator($_POST);
            $validate->rule('required','username')
                    ->rule('required','email')
                    ->rule('required','password')
                    ->rule('accepted','terms-conditions')
                    ->rule('email','email')
                    ->rule('required','username')
                    ->rules([
                        "lengthMin" 
                        => [
                                [
                                    ['username'], 5
                                ]
                            ]
                    ]);
            if($validate->is_valide()){
                $username = htmlspecialchars($_POST['username']);
                $email = htmlspecialchars($_POST['email']);
                $password = htmlspecialchars($_POST['password']);
                if(!in_array(explode('@',$email)[1],['gmail.com','yahoo.com','hotmail.com','protonmail.com'])){
                    $errors_register = true;
                    $message .= 'Votre adresse mail n\'est valide !';
                }else{
                    $user = (new Login)->checkUser($email);
                    if($user === false){
                         $user = (new Users);
                         $user->setUsername($username)
                         ->setEmail($email)
                         ->setPassword(password_hash($password,PASSWORD_BCRYPT));
                        $newUser = (new Register)->newuser($user);
                        (new Login)->db()->insert("INSERT INTO `niveaux` (`id_user`) VALUES (?)",[$newUser]);
                        //sendConfirmeMessage
                        $create_account = true;
                    }else{
                        $errors_register = true;
                        $message .= 'L\utilisateur existe déja !';
                    }
                }
               
            }else{
                $errors = $validate->errors();
            }
            
            $data = $_POST;
        }
        $form = new Form($data,$errors);
        return [$errors_register,$create_account,$form,$message];
    }
}