<?php


namespace EOSRest\Controller;

/**
 * Description of CategoriaController
 *
 * @author ennio
 */
use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class ProdutoController extends AbstractRestfulController
{
    public function getList() 
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Produto')->findAll();

        return $data;
    }
    //get
    public function get($id) 
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $data = $em->getRepository('Application\Entity\Produto')->find($id);

        return $data;        
    }
    //post
    public function create($data) 
    {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        $param['nome'] = $data['nome'];
        $param['descricao'] = $data['descricao'];
        $param['categoriaId'] = $data['categoriaId'];
        
        $produto = $serviceProduto->insert($param);
        if($produto){
            return $produto;
        }else{
            return array('success'=>FALSE);
        }
    }
    //put
    public function update($id, $data) 
    {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        
        $param['id'] = $id;
        $param['nome'] = $data['nome'];
        $param['descricao'] = $data['descricao'];
        $param['categoriaId'] = $data['categoriaId'];
        
        $produto = $serviceProduto->update($param);
        if($produto){
            return $produto;
        }else{
            return array('success'=>FALSE);
        }        
    }
    //delete
    public function delete($id) 
    {
        $serviceProduto = $this->getServiceLocator()->get('Application\Service\Produto');
        $result = $serviceProduto->delete($id);
        if($result) return $result;
    }
}
