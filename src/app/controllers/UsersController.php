<?php

use Phalcon\Mvc\Controller;
use Phalcon\Db\Adapter\Pdo\MySQL as Connection;
 
class UsersController extends Controller
{
    public function indexAction()
    {
       
        // $this->view->users = Users::find();
        
    }
    public function signupAction()
    { 
   if ($this->request->getPost('email')) {
        $user = new Users();
      
            $user->assign(
                $this->request->getPost(),
                [
                    'username',
                    'email',
                    'password'
    
                ]
            );
            $success = $user->save();
    
            $this->view->success = $success;
            if ($success) {
                $this->view->message = "Register succesfully";
            } else {
                $this->view->message = "Not Register succesfully due to following reason: <br>".implode("<br>", $user->getMessages());
            }
        }
    }
    public function dashboardAction()
    { 
        $this->view->users = Users::find();
        
    }
}

?>