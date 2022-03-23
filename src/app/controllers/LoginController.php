<?php

use Phalcon\Mvc\Controller;
use Phalcon\Session\Manager;
use Phalcon\Session\Adapter\Stream;

class LoginController extends Controller
{
    public function indexAction()
    {
        $this->session =$this->container->get('session');
    }
    public function loginAction() {
        // $user = Users::find(["email='$email'"]);
        // $session = new Manager();
        // $files = new Stream(
        //     [
        //      'savePath' => '/tmp',
        //      ]
        // );

        // $session
        // ->setAdapter($files)
        //  ->start();
        
         $this->session  = $this->container->getSession();
       
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');
        $this->session->set('email', $email);
        $this->session->set('password', $pass);
       
        $user = Users::findFirst(['email = "'.$email.'"']);
        //  echo $user->email;
        //  die();
        if ($email == "" && $pass =="") {
         
            echo "Please Insert Email and Password!!!!";
        }
        elseif ($user->email == $email && $user->password == $pass && $user->role == 'users' && $user->status == 'approved') {
            header("Location: http://localhost:8080/blog/index");
        }
        elseif ($user->email == $email && $user->password == $pass && $user->role == 'users' && $user->status == 'unapproved') {
            echo "Your status is not approved. call to admin!!" ;
        }
        elseif ($user->email == $email && $user->password == $pass && $user->role == 'admin' && $user->status == 'approved') {
            header("Location: http://localhost:8080/index");
        }
        elseif ($user->email == $email && $user->password == $pass && $user->role == 'admin' && $user->status == 'unapproved') {
            echo "Your status is not approved. call to admin!!" ;
        }
        else {
            echo "ERROR:404 Wrong Credential Failed!!";
        }
        
    }

        
}