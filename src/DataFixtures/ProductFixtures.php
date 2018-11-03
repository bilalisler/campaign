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
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $product1 = new Products();
        $product1->setName('v yaka tshirt');
        $product1->setBrand($this->getReference(BrandFixtures::REFERENCE1));
        $product1->setCategory($this->getReference(CategoryFixtures::REFERENCE1));
        $product1->setShop($this->getReference(ShopFixtures::REFERENCE1));
        $product1->setDescription('dummy description');
        $product1->setCode('DummyCode123123');
        $product1->setIsactive(1);
        $product1->setIsdelete(0);
        $product1->setStatus(1);
        $product1->setCreatedAt(new \DateTime('now'));

        $product2 = new Products();
        $product2->setName('v yaka tshirt');
        $product2->setBrand($this->getReference(BrandFixtures::REFERENCE2));
        $product2->setCategory($this->getReference(CategoryFixtures::REFERENCE2));
        $product2->setShop($this->getReference(ShopFixtures::REFERENCE1));
        $product2->setDescription('dummy description');
        $product2->setCode('DummyCode123123');
        $product2->setIsactive(1);
        $product2->setIsdelete(0);
        $product2->setStatus(1);
        $product2->setCreatedAt(new \DateTime('now'));

        $product3 = new Products();
        $product3->setName('v yaka tshirt');
        $product3->setBrand($this->getReference(BrandFixtures::REFERENCE3));
        $product3->setCategory($this->getReference(CategoryFixtures::REFERENCE3));
        $product3->setShop($this->getReference(ShopFixtures::REFERENCE1));
        $product3->setDescription('dummy description');
        $product3->setCode('DummyCode123123');
        $product3->setIsactive(1);
        $product3->setIsdelete(0);
        $product3->setStatus(1);
        $product3->setCreatedAt(new \DateTime('now'));

        $product4 = new Products();
        $product4->setName('v yaka tshirt');
        $product4->setBrand($this->getReference(BrandFixtures::REFERENCE1));
        $product4->setCategory($this->getReference(CategoryFixtures::REFERENCE1));
        $product4->setShop($this->getReference(ShopFixtures::REFERENCE1));
        $product4->setDescription('dummy description');
        $product4->setCode('DummyCode123123');
        $product4->setIsactive(1);
        $product4->setIsdelete(0);
        $product4->setStatus(1);
        $product4->setCreatedAt(new \DateTime('now'));

        $product5 = new Products();
        $product5->setName('v yaka tshirt');
        $product5->setBrand($this->getReference(BrandFixtures::REFERENCE1));
        $product5->setCategory($this->getReference(CategoryFixtures::REFERENCE1));
        $product5->setShop($this->getReference(ShopFixtures::REFERENCE1));
        $product5->setDescription('dummy description');
        $product5->setCode('DummyCode123123');
        $product5->setIsactive(1);
        $product5->setIsdelete(0);
        $product5->setStatus(1);
        $product5->setCreatedAt(new \DateTime('now'));

        $product6 = new Products();
        $product6->setName('v yaka tshirt');
        $product6->setBrand($this->getReference(BrandFixtures::REFERENCE2));
        $product6->setCategory($this->getReference(CategoryFixtures::REFERENCE2));
        $product6->setShop($this->getReference(ShopFixtures::REFERENCE1));
        $product6->setDescription('dummy description');
        $product6->setCode('DummyCode123123');
        $product6->setIsactive(1);
        $product6->setIsdelete(0);
        $product6->setStatus(1);
        $product6->setCreatedAt(new \DateTime('now'));

        $product7 = new Products();
        $product7->setName('v yaka tshirt');
        $product7->setBrand($this->getReference(BrandFixtures::REFERENCE3));
        $product7->setCategory($this->getReference(CategoryFixtures::REFERENCE3));
        $product7->setShop($this->getReference(ShopFixtures::REFERENCE1));
        $product7->setDescription('dummy description');
        $product7->setCode('DummyCode123123');
        $product7->setIsactive(1);
        $product7->setIsdelete(0);
        $product7->setStatus(1);
        $product7->setCreatedAt(new \DateTime('now'));

        $manager->persist($product1);
        $manager->persist($product2);
        $manager->persist($product3);
        $manager->persist($product4);
        $manager->persist($product5);
        $manager->persist($product6);
        $manager->persist($product7);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            CategoryFixtures::class,
            BrandFixtures::class,
            ShopFixtures::class,
        );
    }

}