<?php

namespace Dropshippers\APIBundle\DataFixture\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Dropshippers\APIBundle\Entity\Lang;
use Dropshippers\APIBundle\Entity\LocalPsProduct;
use Dropshippers\APIBundle\Entity\Category;
use Dropshippers\APIBundle\Entity\CategoryLocale;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryLoader extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        //prepare db

        $connection = $manager->getConnection();
        $connection->exec("DELETE FROM `ds_category_locale`WHERE id > 0;");
        $connection->exec("DELETE FROM `ds_category` WHERE id > 0;");
        $connection->exec("ALTER TABLE `ds_category` AUTO_INCREMENT = 1;");
        $connection->exec("ALTER TABLE `ds_category_locale` AUTO_INCREMENT = 1;");

        //lang
        
        $langRepository = $manager->getRepository('DropshippersAPIBundle:Lang');
        $lang = $langRepository->findOneBy(['languageCode' => 'fr-fr']);
        
        //categories niveau adulte

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Adulte");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories adulte

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Armes");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Erotisme");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categories Alimentation, boissons et tabac

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Alimentation, boissons et tabac");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categorie Aliementation, boisson et tabac

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Aliments");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Articles pour fumeurs");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Boissons");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie Animaux et articles pour animaux de compagnie

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Animaux et articles pour animaux de compagnie");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories Animaux etc

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Animaux vivants");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Articles pour animaux de compagnie");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie Appareil photo, caméras et instruments d'optique

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Appareils photo, caméras et instruments d'optique");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories appareils etc

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour appareils photo, caméras et instruments d'optique");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Appareils photo et caméras");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Optique");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Photographie");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie Appareils électroniques

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Appareils électroniques");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories appareil electroniques

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour GPS");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour consoles de jeu vidéo");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires électroniques");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Appareils électroniques maritimes");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Audio");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Boîtiers de télépéage");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Circuits imprimés et composants de circuits");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Communications");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Composants");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Consoles de jeux vidéos");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Détecteurs de radars");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Impression, copie, numérisation et télécopie");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Matériel d'arcade");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Ordinateurs");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Radars de vitesse");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Réseaux");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Systèmes de navigation GPS");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Traceurs GPS");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Vidéo");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie Arts et loisirs

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Arts et loisirs");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories appareils etc

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Billets d'événements");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Fêtes et soirées");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Loisirs et arts créatifs");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie Bagages et maroquinerie

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Bagages et maroquinerie");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories appareils etc

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour bagages");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Besaces");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Boîtes étanches");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Housses à vêtements");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Porte-documents");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sacs banane");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sacs de courses");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sacs polochon");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sacs à dos");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sacs à langer");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Trousses de toilette");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Valises");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Vanity-cases");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie Bagages et maroquinerie

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Bébés et tout-petits");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories appareils etc

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires de bain pour bébés");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires de sécurité pour bébés");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires de transport pour bébés");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Allaitement et alimentation");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Apprentissage de la propreté");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Change de bébé");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Coffrets cadeaux pour bébés");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Couvertures d'emmaillotage et couvertures pour bébés");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Jouets pour bébés et équipement d'éveil");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Puériculture");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Transport de bébés");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie Entreprise et industrie

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Entreprise et industrie");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires de stockage industriel");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Agriculture");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Chariots d'entretien");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Cinéma et télévision");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Coiffure et cosmétologie");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Commerce de détail");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Composants d'automatisation");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Construction");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Exploitation des carrières et extraction");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Finance et assurance");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Foresterie et exploitation des forêts");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Hôtel et service d'accueil");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Machinerie lourde");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Maintien de l'ordre public");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Manipulation de matériel");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Marketing et publicité");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Médecine dentaire");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Restauration");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sciences et laboratoire");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Secteur manufacturier");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Secteur médical");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Signalétique");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Stockage industriel");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Tatouages et piercings");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Équipement de protection");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie fournitures de bureau

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Fournitures de bureau");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires de bureau");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour livres");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Chariots de bureau");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Chariots de bureau");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Classement et organisation");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Fournitures d'expédition");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Fournitures de bureau générales");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Matériel de présentation et d'affichage");

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Plaques nominatives");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Soudeuses à impulsions");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sous-mains");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Supports pour ordinateurs portables");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Tapis et protections de sol pour bureaux");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Traitement du papier");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Équipement de bureau");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie jeux et jouets

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Jeux et jouets");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Jeux");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Jeux de plein air");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Jeux de puzzle");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Jouets");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Minuteurs");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie logiciels

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Logiciels");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Biens et monnaie virtuels");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Jeux vidéo");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Logiciels informatiques");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie maison et jardin

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Maison et jardin");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires de salle de bain");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour appareils électroménagers");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour cheminées et poêles à bois");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour fumeurs");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Acccessoires pour luminaires");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Appareils électroménagers");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Arts de la table et arts culinaires");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Cheminées");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Décorations");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Linge");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Luminaires");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Parasols et parapluies");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Pelouses et jardins");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Piscine et spa");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Plantes");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Poêles à bois");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Produits ménagers");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Préparation aux situations d'urgence");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sécurité gaz, incendie et inondation");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sécurité à domicile et au bureau");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Étuis à parapluie");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie meubles

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Meubles");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour canapés");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour fauteuils");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour la division de pièces");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour meubles d'extérieur");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires meubles de bureau");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour tables");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour étagères");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Armoires et meubles de rangement");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Bancs");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Cadres de futon");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Canapés");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Chariots et îlots");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Ensembles de meubles");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Fauteuils");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Lits et accessoires");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Matelas pour futons");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Meubles audio/vidéo et pour home cinéma");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Meubles de bureau");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Meubles de jardin");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Mobilier pour bébés et tout-petits");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Poufs");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Séparateurs de pièces");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Tables");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Étagères");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie médias

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Médias");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("DVD et vidéos");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Guides d'utilisation");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Livres");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Livres");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Magazines et journaux");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Musique et enregistrements audio");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Partitions");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Plans de charpenterie et de menuiserie");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie religion

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Offices religieux et cérémonies");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Fournitures de mariage");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Fournitures ecclésiastiques");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Objets religieux");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie quincallerie

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Quincaillerie");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires d'outils");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires de quincaillerie");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires électriques");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Chauffage, ventilation et climatisation");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Clôtures et barrières");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Consommables de construction");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Conteneurs et citernes pour combustible");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Matériaux de construction");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Outils");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Petits moteurs");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Plomberie");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Pompes");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Réservoirs de stockage");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Serrures et clés");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie santé et beauté

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Santé et beauté");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Entretien et nettoyage des bijoux");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Hygiène personnelle");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Santé");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie Véhicules et accessoires

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Véhicules et accessoires");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Pièces détachées pour véhicules");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Véhicules");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie Vetements et access

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Vêtements et accessoires");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires d'habillement");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour chaussures");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Accessoires pour sacs à main et portefeuilles");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Bijoux");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Chaussures");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Déguisements et accessoires");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Sacs à main, portefeuilles et étuis");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Vêtements");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        //categorie equipement sportif

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage($lang);
        $loc->setName("Équipements sportifs");
        $manager->persist($parent);
        $manager->persist($loc);

        //sous categories

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Divers sports");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Entraînement et fitness");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Jeux d'intérieur");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $cat = new Category();
        $cat->setCreatedAt(new \DateTime());
        $cat->setUpdatedAt(new \DateTime());
        $cat->setActive(1);
        $cat->setParent($parent);
        $cat->setLevelDepth(1);
        $loc = new CategoryLocale();
        $loc->setName("Loisirs de plein air");
        $loc->setLanguage($lang);
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}