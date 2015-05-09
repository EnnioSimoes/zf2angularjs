<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Produto;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */    
    public function load(ObjectManager $manager) 
    {
        $categoriaLivros = $this->getReference('categoria-livros');
        $categoriaComputadores = $this->getReference('categoria-computadores');
        
        $produto = new Produto();
        $produto->setNome('Orientação a Objetos')
                ->setCategoria($categoriaLivros)
                ->setDescricao('Descrição do livro');
        $manager->persist($produto);
        
        $produto2 = new Produto();
        $produto2->setNome('Sony Vaio')
                ->setCategoria($categoriaComputadores)
                ->setDescricao('Notebook 13"');
        $manager->persist($produto2);
        
        $manager->flush();
    }

    public function getOrder() {
        return 20;
    }

}