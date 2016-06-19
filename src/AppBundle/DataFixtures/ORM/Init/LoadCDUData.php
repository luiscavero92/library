<?php
namespace AppBundle\DataFixtures\ORM\Init;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\CDU;
use Doctrine\ORM\Query\ResultSetMapping;

class LoadCDUData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

    	$data_file = fopen('src/AppBundle/DataFixtures/ORM/Init/cduData.txt', 'r');

    	while(!feof($data_file)){

    		$splitEntry = preg_split("/\|/", fgets($data_file)); 

    		$code = $splitEntry[0];

    		$description = preg_replace("/\n/", "", $splitEntry[1]);

    		$cduEntry = new CDU();
	        $cduEntry->setCode($code);
	        $cduEntry->setDescription($description);

	        $manager->persist($cduEntry);
    	}

        $manager->flush();
     
    }

    public function getOrder()
    {
       return 1; 
    }
}