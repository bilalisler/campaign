<?php
/**
 * Created by PhpStorm.
 * User: bilalisler
 * Date: 11/3/18
 * Time: 10:33 AM
 */

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public const REFERENCE1 = "admin";
    public const REFERENCE2 = "shop";
    public const REFERENCE3 = "customer";

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setEmail('dummy_admin@dummy.com');
        $admin->setPassword('$2y$13$op.ptDDtZS7deiHz5YeTzupKrgH3QQZ.Ll56mlSDBXMU2HD6EJ726');
        $admin->setRoles(array('ROLE_SUPER_ADMIN'));

        $shop = new User();
        $shop->setEmail('dummy_shop@dummy.com');
        $shop->setPassword('$2y$13$op.ptDDtZS7deiHz5YeTzupKrgH3QQZ.Ll56mlSDBXMU2HD6EJ726');
        $shop->setRoles(array('ROLE_SHOP'));

        $customer = new User();
        $customer->setEmail('dummy_customer@dummy.com');
        $customer->setPassword('$2y$13$op.ptDDtZS7deiHz5YeTzupKrgH3QQZ.Ll56mlSDBXMU2HD6EJ726');
        $customer->setRoles(array('ROLE_CUSTOMER'));

        $manager->persist($admin);
        $manager->persist($shop);
        $manager->persist($customer);

        $manager->flush();

        $this->addReference(self::REFERENCE1,$admin);
        $this->addReference(self::REFERENCE2,$shop);
        $this->addReference(self::REFERENCE3,$customer);
    }

}