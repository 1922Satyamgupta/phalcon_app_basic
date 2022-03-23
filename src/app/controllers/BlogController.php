<?php
use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;
use Phalcon\Session\Manager;
use Phalcon\Session\Adapter\Stream;


class blogController extends Controller
{
    public function indexAction()
    {
        $this->session =$this->container->get('session');
        
        
}
public function collectionAction() {

}
public function shoesAction() {

}
public function racingbootsAction() {

}
public function contactAction() {

}
public function logoutAction() {
    
    
         $this->session->destroy();
         $this->response->redirect('users/dashboard');
        
 }
}
?>