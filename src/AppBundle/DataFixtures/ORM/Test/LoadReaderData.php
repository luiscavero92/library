<?php
namespace AppBundle\DataFixtures\ORM\Test;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Reader;

class LoadReaderData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for($i=0; $i<20; $i++){

            $reader = new Reader();

            $reader->setRecordNumber('11111111'.$i);
            $reader->setNif('17468520A');
            $reader->setFirstName('Luis');
            $reader->setLastName('Cavero Martínez');
            $reader->setEmail('luiscavero9' . $i . '@gmail.com');
            $reader->setPhone('69912929'.$i);
            $reader->setPhoto('laquesea '.$i);

            $manager->persist($reader);
        }
        
        $manager->flush();
     
    }

    public function getOrder()
    {
       return 5; 
    }
}