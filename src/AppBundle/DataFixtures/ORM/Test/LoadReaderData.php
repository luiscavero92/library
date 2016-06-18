<?php
namespace AppBundle\DataFixtures\ORM\Test;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use AppBundle\Entity\Reader;

class LoadReaderData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {
        $reader = new Reader();

        $reader->setRecordNumber('11111111');
        $reader->setUserName('admin');
   
        $plainPassword = 'password';
        $encoder = $this->container->get('security.password_encoder');
        $encoded = $encoder->encodePassword($reader, $plainPassword);

        $reader->setPassword($encoded);
        $reader->setRoles(["ROLE_ADMIN"]);

        $reader->setNif('17468520A');
        $reader->setFirstName('Luis');
        $reader->setLastName('Cavero Martínez');
        $reader->setEmail('luiscavero9@gmail.com');
        $reader->setPhone('69912929');
        $reader->setPhoto('laquesea ');

        $manager->persist($reader);

        $userNames = ["Luis", "Juanjo", "Susan", "David", "Cristian"];

        $userLastNames = ["Cavero Martínez", "Martínez", "Hernandez Luján", "Bernabé Casas"];

        for($i=0; $i<20; $i++){


            $reader = new Reader();

            $reader->setRecordNumber('11111111'.$i);
            $reader->setUserName('reader'.$i);
       
            $plainPassword = 'password';
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($reader, $plainPassword);

            $reader->setPassword($encoded);

            $reader->setNif('17468520A');
            $reader->setFirstName($userNames[array_rand($userNames)]);
            $reader->setLastName($userLastNames[array_rand($userLastNames)]);
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