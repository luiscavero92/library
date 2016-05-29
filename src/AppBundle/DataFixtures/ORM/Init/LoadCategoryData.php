<?php
namespace AppBundle\DataFixtures\ORM\Init;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Category;
use Doctrine\ORM\Query\ResultSetMapping;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $categories = ['BOOK', 'CD', 'DVD', 'VHS', 'OTHER'];

        foreach ($categories as $value) {
            $category = new Category();
            $category->setDescription($value);
            $manager->persist($category);
        }
        
        $manager->flush();
     
    }

    public function getOrder()
    {
       return 2; 
    }
}