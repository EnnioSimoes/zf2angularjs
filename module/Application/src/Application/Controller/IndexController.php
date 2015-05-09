<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository("Application\Entity\Categoria");
//        $categoria = new Categoria();
//        $categoria->setNome("Notebook");
        
//        $em->persist($categoria);
//        $em->flush();     
        /*
        $categorias = $repo->findAll();

        $categoria = $repo->find(1);   
        $produto = new Produto();
        $produto->setNome("GTA5")
            ->setDescricao("Melhor jogo do mundo!")
            ->setCategoria($categoria);
        
        $em->persist($produto);
        $em->flush();
        
        $categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
        $categoriaService->update(array('id'=>5, 'nome'=>'Componentes' ));
        $categorias = $repo->findAll();
        
    
        $produto = $this->getServiceLocator()->get('Application\Service\Produto');
        $produto->update(array('id'=>5, 'nome'=>'Componentes' ));
        
        $produto->setNome("GTA5")
            ->setDescricao("Melhor jogo do mundo!")
            ->setCategoria($categoria);        
        
        $produtoService = $this->getServiceLocator()->get('Application\Service\Produto');
        $produtoService->update(array('id'=>5, 'nome'=>'Mortal Kombat X', 'descricao'=>'OhhhhhhhXX', 'categoriaId'=>1));
        */
        
        $categorias = $repo->findAll();        
        return new ViewModel(array('categorias'=>$categorias));
    }
}
