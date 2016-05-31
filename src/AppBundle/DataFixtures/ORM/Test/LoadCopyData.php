<?php
namespace AppBundle\DataFixtures\ORM\Test;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Copy;

class LoadCopyData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $articles = $manager->getRepository('AppBundle:Article')->findAll();

		for($i = 0; $i<30; $i++){
        
            $randArticle = $articles[array_rand($articles)];

            $copy = new Copy();
            $copy->setArticle($randArticle);
            $copy->setCopyNumber('COPYNUMBER'.$i);
            $copy->setAddedOn(new \DateTime());

            $manager->persist($copy);
        }
            
        $manager->flush();

    }

    public function getOrder()
    {
       return 4; 
    }
}