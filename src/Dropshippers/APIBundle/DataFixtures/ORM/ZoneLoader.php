<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 17/10/16
 * Time: 19:08
 */

namespace Dropshippers\APIBundle\DataFixture\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Dropshippers\APIBundle\Entity\Country;
use Dropshippers\APIBundle\Entity\Zone;

class ZoneLoader extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //prepare db

        $connection = $manager->getConnection();
        $connection->exec("DELETE FROM `ds_zone` WHERE id > 0;");
        $connection->exec("ALTER TABLE `ds_zone` AUTO_INCREMENT = 1;");
        $connection->exec("DELETE FROM `ds_country` WHERE id > 0;");
        $connection->exec("ALTER TABLE `ds_country` AUTO_INCREMENT = 1;");

        // zones

        // zone europe
        $zone = new Zone();
        $zone->setName('Europe');
        $manager->persist($zone);

        //countries from europe
        $country = new Country();
        $country->setIsoCode('DE');
        $country->setName('Germany');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('AT');
        $country->setName('Austria');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('BE');
        $country->setName('Belgium');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('ES');
        $country->setName('Spain');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('FI');
        $country->setName('Finland');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('FR');
        $country->setName('France');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('GR');
        $country->setName('Greece');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('IT');
        $country->setName('Italia');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('LU');
        $country->setName('Luxembourg');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('NL');
        $country->setName('Netherlands');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('PL');
        $country->setName('Poland');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('PT');
        $country->setName('Portugal');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('CZ');
        $country->setName('Czech Republic');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('GB');
        $country->setName('United Kingdom');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('SE');
        $country->setName('Sweden');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('DK');
        $country->setName('Denmark');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('IE');
        $country->setName('Ireland');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('RO');
        $country->setName('Romania');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('SK');
        $country->setName('Slovakia');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('CY');
        $country->setName('Cyprus');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('EE');
        $country->setName('Estonia');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('LV');
        $country->setName('Latvia');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('LI');
        $country->setName('Liechtenstein');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('LT');
        $country->setName('Lithuania');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('MT');
        $country->setName('Malta');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('HU');
        $country->setName('Hungary');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('SI');
        $country->setName('Slovenia');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('UA');
        $country->setName('Ukraine');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('BA');
        $country->setName('Bosnia and Herzegovina');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('BG');
        $country->setName('Bulgaria');
        $country->setIdZone($zone);
        $manager->persist($country);

        //zone  north america

        $zone = new Zone();
        $zone->setName('North America');
        $manager->persist($zone);

        //north america countries

        $country = new Country();
        $country->setIsoCode('CA');
        $country->setName('Canada');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('US');
        $country->setName('United States');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('AS');
        $country->setName('American Samoa');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('AG');
        $country->setName('Antigua and Barbuda');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('BS');
        $country->setName('Bahamas');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('BB');
        $country->setName('Barbados');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('BM');
        $country->setName('Bermuda');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('MX');
        $country->setName('Mexico');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('VG');
        $country->setName('Virgin Islands (British)');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('VI');
        $country->setName('Virgin Islands (U.S.)');
        $country->setIdZone($zone);
        $manager->persist($country);

        $country = new Country();
        $country->setIsoCode('');
        $country->setName('');
        $country->setIdZone($zone);
        $manager->persist($country);

        $zone = new Zone();
        $zone->setName('Asia');
        $manager->persist($zone);

        $zone = new Zone();
        $zone->setName('Africa');
        $manager->persist($zone);

        $zone = new Zone();
        $zone->setName('Oceania');
        $manager->persist($zone);

        $zone = new Zone();
        $zone->setName('South America');
        $manager->persist($zone);

        $zone = new Zone();
        $zone->setName('Europe (non-EU)');
        $manager->persist($zone);

        $zone = new Zone();
        $zone->setName('Central America\/Antilla');
        $manager->persist($zone);

        $zone = new Zone();
        $zone->setName('Ile de France');
        $manager->persist($zone);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}