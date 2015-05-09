<?php

namespace EOSUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session as SessionStorage;
use Zend\View\Model\JsonModel;

/**
 * Description of AuthController
 *
 * @author ennio
 */
class AuthController extends AbstractActionController
{
    public function indexAction() 
    {
        $request = $this->getRequest();
        if($request->isPost()){
            $data = $request->getPost();
            $auth = new AuthenticationService();
            $sessionStorage = new SessionStorage();
            $auth->setStorage($sessionStorage);
            
            $authAdapter = $this->getServiceLocator()->get('EOSUser\Auth\DoctrineAdapter');
            $authAdapter->setUsername($data['username'])
                    ->setPassword($data['password']);
            
            $result = $auth->authenticate($authAdapter);
            if($result->isValid()){
                $sessionStorage->write($auth->getIdentity()['user'], NULL);
                return new JsonModel(array('success'=>TRUE));
            }  else {
                return new JsonModel(array('success'=>FALSE));
            }
        }
        return new JsonModel(array('success'=>FALSE));
    }
}
