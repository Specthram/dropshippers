<?php

namespace Dropshippers\APIBundle\DataFixture\ORM;

use Dropshippers\APIBundle\Entity\LocalPsProduct;
use Dropshippers\APIBundle\Entity\Category;
use Dropshippers\APIBundle\Entity\CategoryLocale;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryLoader implements FixtureInterface
{

    public function load(ObjectManager $manager){

        //categories niveau adulte

        $parent = new Category();
        $parent->setCreatedAt(new \DateTime());
        $parent->setUpdatedAt(new \DateTime());
        $parent->setActive(1);
        $parent->setLevelDepth(0);
        $parent->setParent(null);
        $loc = new CategoryLocale();
        $loc->setCategory($parent);
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
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
        $loc->setLanguage("fr-FR");
        $loc->setCategory($cat);
        $manager->persist($cat);
        $manager->persist($loc);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}