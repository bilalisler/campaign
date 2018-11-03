<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 11/3/18
 * Time: 10:33 AM
 */

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Products;
use App\Entity\ShopProfile;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ShopFixtures extends Fixture implements DependentFixtureInterface
{
    public const REFERENCE1 = 'shop1';
    
    public function load(ObjectManager $manager)
    {
        $shop1 = new ShopProfile();
        $shop1->setName('shop1');
        $shop1->setAddress('shop1 address');
        $shop1->setCity(34);
        $shop1->setDescription('shop1 description');
        $shop1->setLatitude(34.09989);
        $shop1->setLongitude(34.09989);
        $shop1->setPhone(055555555);
        $shop1->setTown(11);
        $shop1->setUser($this->getReference(UserFixtures::REFERENCE2));
        
        $manager->persist($shop1);

        $manager->flush();
        
        $this->addReference(self::REFERENCE1,$shop1);
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }

}