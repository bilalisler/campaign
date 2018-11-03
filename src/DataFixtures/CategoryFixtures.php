<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 11/3/18
 * Time: 10:33 AM
 */

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const REFERENCE1 = 'CATEGORY1';
    public const REFERENCE2 = 'CATEGORY2';
    public const REFERENCE3 = 'CATEGORY3';
    public const REFERENCE4 = 'CATEGORY4';
    public const REFERENCE5 = 'CATEGORY5';
    public const REFERENCE6 = 'CATEGORY6';

    public function load(ObjectManager $manager)
    {
        $categories1 = new Categories();
        $categories1->setParent(null);
        $categories1->setCategoryOrder(0);
        $categories1->setCategoryName("Giyim");
        $categories1->setCategoryStatus(1);
        $categories1->setCreatedAt(new \DateTime('now'));
        $categories1->setCategorySubname('giyim-subname');
        $categories1->setCategoryDescription("Category 1");

        $categories2 = new Categories();
        $categories2->setParent($categories1);
        $categories2->setCategoryOrder(0);
        $categories2->setCategoryName("Alt Giyim");
        $categories2->setCategoryStatus(1);
        $categories2->setCreatedAt(new \DateTime('now'));
        $categories2->setCategorySubname('alt-giyim-subname');
        $categories2->setCategoryDescription("Category 2");

        $categories3 = new Categories();
        $categories3->setParent($categories1);
        $categories3->setCategoryOrder(0);
        $categories3->setCategoryName("Üst Giyim");
        $categories3->setCategoryStatus(1);
        $categories3->setCreatedAt(new \DateTime('now'));
        $categories3->setCategorySubname('ust-giyim-subname');
        $categories3->setCategoryDescription("Category 3");

        $categories4 = new Categories();
        $categories4->setParent(null);
        $categories4->setCategoryOrder(1);
        $categories4->setCategoryName("Ayakkabı");
        $categories4->setCategoryStatus(1);
        $categories4->setCreatedAt(new \DateTime('now'));
        $categories4->setCategorySubname('ayakkabi-subname');
        $categories4->setCategoryDescription("Category 4");

        $categories5 = new Categories();
        $categories5->setParent(null);
        $categories5->setCategoryOrder(2);
        $categories5->setCategoryName("Aksesuar");
        $categories5->setCategoryStatus(1);
        $categories5->setCreatedAt(new \DateTime('now'));
        $categories5->setCategorySubname('aksesuar-subname');
        $categories5->setCategoryDescription("Category 5");

        $categories6 = new Categories();
        $categories6->setParent($categories3);
        $categories6->setCategoryOrder(0);
        $categories6->setCategoryName("T-shirt");
        $categories6->setCategoryStatus(1);
        $categories6->setCreatedAt(new \DateTime('now'));
        $categories6->setCategorySubname('giyim-subname');
        $categories6->setCategoryDescription("Category 6");


        $manager->persist($categories1);
        $manager->persist($categories2);
        $manager->persist($categories3);
        $manager->persist($categories4);
        $manager->persist($categories5);
        $manager->persist($categories6);

        $manager->flush();

        $this->addReference(self::REFERENCE1,$categories1);
        $this->addReference(self::REFERENCE2,$categories2);
        $this->addReference(self::REFERENCE3,$categories3);
        $this->addReference(self::REFERENCE4,$categories4);
        $this->addReference(self::REFERENCE5,$categories5);
        $this->addReference(self::REFERENCE6,$categories6);
    }

}