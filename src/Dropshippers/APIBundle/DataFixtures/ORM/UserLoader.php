<?php
/**
 * Created by PhpStorm.
 * User: emmanuel.escourre
 * Date: 22/03/2016
 * Time: 11:58
 */

namespace Dropshippers\APIBundle\DataFixture\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dropshippers\APIBundle\Entity\User;

class UserLoader implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $darknight = new User();
        $darknight->setUsername("darknight");
        $darknight->setEmail("darknight@mail.fr");
        $darknight->setPassword("aaaaaaaaa");

        $superman = new User();
        $superman->setUsername("superman");
        $superman->setEmail("superman@mail.fr");
        $superman->setPassword("aaaaaaaaa");

        $admin = new User();
        $admin->setUsername("admin");
        $admin->setEmail("admin@admin.fr");
        $admin->setPassword("admin");


        $manager->persist($superman);
        $manager->persist($darknight);
        $manager->persist($admin);


        $manager->flush();

    }
}