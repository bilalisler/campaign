<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 11/3/18
 * Time: 10:33 AM
 */

namespace App\DataFixtures;


use App\Entity\ProductsBrands;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BrandFixtures extends Fixture
{
    public const REFERENCE1 = 'BRAND1';
    public const REFERENCE2 = 'BRAND2';
    public const REFERENCE3 = 'BRAND3';
    public const REFERENCE4 = 'BRAND4';

    public function load(ObjectManager $manager)
    {
        $brand1 = new ProductsBrands();
        $brand1->setBrandName('LCW');
        $brand1->setBrandStatus(1);
        $brand1->setCreatedAt(new \DateTime('now'));

        $brand2 = new ProductsBrands();
        $brand2->setBrandName('ZARA');
        $brand2->setBrandStatus(1);
        $brand2->setCreatedAt(new \DateTime('now'));

        $brand3 = new ProductsBrands();
        $brand3->setBrandName('Nike');
        $brand3->setBrandStatus(1);
        $brand3->setCreatedAt(new \DateTime('now'));

        $brand4 = new ProductsBrands();
        $brand4->setBrandName('Adidas');
        $brand4->setBrandStatus(1);
        $brand4->setCreatedAt(new \DateTime('now'));


        $manager->persist($brand1);
        $manager->persist($brand2);
        $manager->persist($brand3);
        $manager->persist($brand4);

        $manager->flush();

        $this->addReference(self::REFERENCE1, $brand1);
        $this->addReference(self::REFERENCE2, $brand2);
        $this->addReference(self::REFERENCE3, $brand3);
        $this->addReference(self::REFERENCE4, $brand4);
    }

}