<?php

use Phalcon\Mvc\Controller;



class dashboardController extends Controller
{
    public function indexAction()
    { 
        $this->view->users = Users::find();
        
    }
    
}
?>