<?php
namespace AppBundle\DataFixtures\ORM\Test;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Loan;

class LoadLoanData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $articles = $manager->getRepository('AppBundle:Article')->findAll();
        $readers = $manager->getRepository('AppBundle:Reader')->findAll();

        for($i=0; $i<20;$i++){
            
            $randArticle = $articles[array_rand($articles)];

            $copies = $manager
            ->getRepository('AppBundle:Copy')
            ->findBy(array('article' => $randArticle, 'available' => true));
            if($copies){
                $copy = $copies[0];
            }else{
                continue;
            }
            
            $randReader = $readers[array_rand($readers)];

            $loan = new Loan();
            $loan->setCopy($copy);
            $loan->setReader($randReader);
            $loan->setLoanDate(date_create(date("Y-m-d")));

            $manager->persist($loan);
        }       

        $manager->flush();
        
        
     
    }

    public function getOrder()
    {
       return 6; 
    }
}