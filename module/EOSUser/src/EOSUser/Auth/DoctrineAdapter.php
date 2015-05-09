<?php

namespace EOSUser\Auth;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use Doctrine\ORM\EntityManager;

class DoctrineAdapter implements AdapterInterface
{
    /**
     *
     * @var Doctrine\ORM\EntityManager 
     */
    protected $em;
    protected $username;
    protected $password;
    
    public function __construct(EntityManager $em) 
    {
        $this->em = $em;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    function setPassword($password) {
        $this->password = $password;
        return $this;
    }
    
    public function authenticate() 
    {
        $repository = $this->em->getRepository('EOSUser\Entity\User');
        $user = $repository->findOneBy(array('username' =>  $this->getUsername(), 'password' => $this->getPassword()));
        if($user){
            return new Result(Result::SUCCESS, array('user' => $user), array('ok'));
        }else{
            return new Result(Result::FAILURE_CREDENTIAL_INVALID, NULL, array());
        }
    }

}
