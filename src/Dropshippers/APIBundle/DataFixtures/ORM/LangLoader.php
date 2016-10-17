<?php
/**
 * Created by PhpStorm.
 * User: emmanuel.escourre
 * Date: 22/03/2016
 * Time: 11:58
 */

namespace Dropshippers\APIBundle\DataFixture\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dropshippers\APIBundle\Entity\Lang;

class LangLoader extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $connection = $manager->getConnection();
        $connection->exec("DELETE FROM `ds_lang` WHERE id > 0;");
        $connection->exec("ALTER TABLE `ds_lang` AUTO_INCREMENT = 1;");

        $lang = new Lang();
        $lang->setName('English (English)');
        $lang->setIsoCode('en');
        $lang->setLanguageCode('en-us');
        $manager->persist($lang);

        $lang = new Lang();
        $lang->setName('Français (French)');
        $lang->setIsoCode('fr');
        $lang->setLanguageCode('fr-fr');
        $manager->persist($lang);

        $lang = new Lang();
        $lang->setName('Espanol AR (Spanish)');
        $lang->setIsoCode('ag');
        $lang->setLanguageCode('es-ar');
        $manager->persist($lang);

        $lang = new Lang();
        $lang->setName('Espanol (Spanish)');
        $lang->setIsoCode('es');
        $lang->setLanguageCode('es-es');
        $manager->persist($lang);

        $lang = new Lang();
        $lang->setName('Deutsch (German)');
        $lang->setIsoCode('de');
        $lang->setLanguageCode('de-de');
        $manager->persist($lang);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}