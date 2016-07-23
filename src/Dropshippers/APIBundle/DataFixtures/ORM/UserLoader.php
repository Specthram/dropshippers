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
use Dropshippers\APIBundle\Entity\Shop;
use Dropshippers\APIBundle\Entity\Module;

class UserLoader implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $darknight = new User();
        $darknight->setUsername("darknight");
        $darknight->setEmail("darknight@mail.fr");
        $darknight->setPassword("aaaaaaaaa");
        $darknight->setToken($this->generateRandomString(100));

        $superman = new User();
        $superman->setUsername("superman");
        $superman->setEmail("superman@mail.fr");
        $superman->setPassword("aaaaaaaaa");
        $superman->setToken($this->generateRandomString(100));

        $admin = new User();
        $admin->setUsername("admin");
        $admin->setEmail("admin@admin.fr");
        $admin->setPassword("admin");
        $admin->setToken($this->generateRandomString(100));

        $shop1 = new Shop();
        $shop1->setAddress("18 avenue de la paix");
        $shop1->setAddressZipcode("75000");
        $shop1->setCity("paris");
        $shop1->setMail("contact@efzef.fr");
        $shop1->setName("red mad coon");
        $shop1->setPhone("0122334455");
        $shop1->setStatus("active");
        $shop1->setWebserviceKey($this->generateRandomString(100));
        $shop1->setUrl("http://monsite.com/");
        $shop1->setCreatedAt(new \DateTime());
        $shop1->setUpdatedAt(new \DateTime());

        $shop2 = new Shop();
        $shop2->setAddress("1 rue de la fonte");
        $shop2->setAddressZipcode("36000");
        $shop2->setCity("lavillettope");
        $shop2->setMail("contact@eftrhyj.com");
        $shop2->setName("pretty regrets");
        $shop2->setPhone("0256738923");
        $shop2->setStatus("active");
        $shop2->setWebserviceKey($this->generateRandomString(100));
        $shop2->setUrl("http://prettyregrets.com/");
        $shop2->setCreatedAt(new \DateTime());
        $shop2->setUpdatedAt(new \DateTime());

        $shop3 = new Shop();
        $shop3->setAddress("16 chemin de la gaulle");
        $shop3->setAddressZipcode("67080");
        $shop3->setCity("arnouvile");
        $shop3->setMail("dede@test.com");
        $shop3->setName("HotDogs");
        $shop3->setPhone("0167895436");
        $shop3->setStatus("active");
        $shop3->setWebserviceKey($this->generateRandomString(100));
        $shop3->setUrl("http://hotdogs.com/");
        $shop3->setCreatedAt(new \DateTime());
        $shop3->setUpdatedAt(new \DateTime());

        $module1 = new Module();
        $module1->setName("main");
        $module1->setActive(1);
        $module1->setLang("fr");
        $module1->setType("prestashop16");
        $module1->setToken($this->generateRandomString(100));

        $module2 = new Module();
        $module2->setName("main");
        $module2->setActive(1);
        $module2->setLang("fr");
        $module2->setType("prestashop16");
        $module2->setToken($this->generateRandomString(100));

        $module3 = new Module();
        $module3->setName("main");
        $module3->setActive(1);
        $module3->setLang("fr");
        $module3->setType("prestashop16");
        $module3->setToken($this->generateRandomString(100));


        $module1->setShop($shop1);
        $module2->setShop($shop2);
        $module3->setShop($shop3);
        $superman->setShop($shop1);
        $darknight->setShop($shop2);
        $admin->setShop($shop3);

        $manager->persist($shop1);
        $manager->persist($shop2);
        $manager->persist($shop3);
        $manager->persist($superman);
        $manager->persist($darknight);
        $manager->persist($admin);
        $manager->persist($module1);
        $manager->persist($module2);
        $manager->persist($module3);

        $manager->flush();

    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}