<?php
namespace AppBundle\DataFixtures\ORM\Test;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Article;

class LoadArticleData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cdus = $manager->getRepository('AppBundle:CDU')->findAll();
        $categories = $manager->getRepository('AppBundle:Category')->findAll();

        for($i = 0; $i < 10; $i++){
            
            $randCdu = $cdus[array_rand($cdus)];

            $randCategory = $categories[array_rand($categories)];

            $article = new Article();

            $article->setRefNumber('34343434'.$i);
            $article->setIsbn('65656565656-'.$i);
            $article->setTitle('Alfagann es Flanagan');
            $article->setSubtitle('el detective');
            $article->setAuthors(['Miguel de Cervantes', 'Galileo Galilei', 'Luilli']);
            $article->setEditionYear('1990');
            $article->setLegalDeposit('Depósito legal: '.$i);
            $article->setPublisher('Circulo de lectores');
            $article->setLocation('Estanteria juvenil');
            $article->setCdu($randCdu);
            $article->setCategory($randCategory);
            $article->setNote('The best note');

            $manager->persist($article);
        }
		
        $manager->flush();
     
    }

    public function getOrder()
    {
       return 3; 
    }
}