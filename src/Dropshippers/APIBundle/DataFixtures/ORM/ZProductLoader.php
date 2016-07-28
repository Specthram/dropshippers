<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 26/07/2016
 * Time: 11:04
 */

namespace Dropshippers\APIBundle\DataFixture\ORM;


use Dropshippers\APIBundle\Entity\LocalPsProduct;
use Dropshippers\APIBundle\Entity\Product;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProductLoader implements FixtureInterface
{

    public function load(ObjectManager $manager){

        //Alors j'ai appeler ce fichier de la sorte car lors du load des data fixture il procede par ordre alphabetique et la du coup ca pose probleme quand d'essai de setShopOrigin alors u'il n'y a rien en base

        $t = $manager->getRepository("DropshippersAPIBundle:Shop")->findAll();

        $product1 = new LocalPsProduct();
        $product1->setProductId(1);
        $product1->setDropshippersRef("aaaa");
        $product1->setShop($t[0]);
        $product1->setShopOrigin($t[0]);
        $product1->setDescription("Le MarcOunet sauvage est un pokemon travailleur, d'origine asiatique, il produit à une cadence monstre, il aime les caresse. Il vous ai permis d'abuser de lui, sexuellement");
        $product1->setName("MarcOunet");
        $product1->setActive(true);
        $product1->setPrice(15.2);
        $product1->setSupplierReference("dsgdfgdfgdg");
        $product1->setAvailableOrder(true);
        $product1->setCreatedAt(new \DateTime());
        $product1->setUpdatedAt(new \DateTime());

        $product2 = new LocalPsProduct();
        $product2->setProductId(2);
        $product2->setDropshippersRef("bbbb");
        $product2->setShop($t[0]);
        $product2->setShopOrigin($t[1]);
        $product2->setDescription("L'Antonato sauvage est un pokemon bizarre, d'origine inconnue, quand il est fatigué, il a le regard vitreux et ne capte plus aucun message et signaux, il aime pas les caresse mais il vous ai permis d'abuser de lui, sexuellement");
        $product2->setName("Antonato");
        $product2->setActive(true);
        $product2->setPrice(25.2);
        $product2->setSupplierReference("dsgdfgdfgdg");
        $product2->setAvailableOrder(true);
        $product2->setCreatedAt(new \DateTime());
        $product2->setUpdatedAt(new \DateTime());


        $product3 = new LocalPsProduct();
        $product3->setProductId(1);
        $product3->setDropshippersRef("cccc");
        $product3->setShopOrigin($t[1]);
        $product3->setShop($t[0]);
        $product3->setDescription("Le Scofieraptu sauvage est un pokemon discret, d'origine asiatique, il aime le foot. Attention un Scofieraptu peut en cacher un autre");
        $product3->setName("Scofieraptu");
        $product3->setActive(true);
        $product3->setPrice(35.2);
        $product3->setSupplierReference("dsgdfgdfgdg");
        $product3->setAvailableOrder(true);
        $product3->setCreatedAt(new \DateTime());
        $product3->setUpdatedAt(new \DateTime());

        $product4 = new LocalPsProduct();
        $product4->setProductId(4);
        $product4->setDropshippersRef("dddd");
        $product4->setShopOrigin($t[2]);
        $product4->setShop($t[0]);
        $product4->setDescription("La Sibatata sauvage est un pokemon joyeux, d'origine inconnu, son attack criStrident fait beaucoup de dégat, elle a des trou dans les oreilles et un anneaux dans le nez, il rafolle de spykotrope et festoche");
        $product4->setName("Sibatata");
        $product4->setActive(true);
        $product4->setPrice(45.2);
        $product4->setSupplierReference("dsgdfgdfgdg");
        $product4->setAvailableOrder(true);
        $product4->setCreatedAt(new \DateTime());
        $product4->setUpdatedAt(new \DateTime());

        $product5 = new LocalPsProduct();
        $product5->setProductId(5);
        $product5->setDropshippersRef("eeee");
        $product5->setShop($t[0]);
        $product5->setShopOrigin($t[0]);
        $product5->setDescription("La LeeeJeee sauvage est un pokemon gentil, d'origine asiatique, il vous séduira dès les premiers instant, attention tout de meme, son attack 'fuite' peut vous laissez perplexe");
        $product5->setName("LeeeJeee");
        $product5->setActive(true);
        $product5->setPrice(55.2);
        $product5->setSupplierReference("dsgdfgdfgdg");
        $product5->setAvailableOrder(true);
        $product5->setCreatedAt(new \DateTime());
        $product5->setUpdatedAt(new \DateTime());

        $product5 = new LocalPsProduct();
        $product5->setProductId(6);
        $product5->setDropshippersRef("ffffff");
        $product5->setShop($t[1]);
        $product5->setShopOrigin($t[0]);
        $product5->setDescription("ce pokemon sauvage au nom bien étrange fesant allusion aux danses ancestrale des pokemon légendaires érotiques banane choux poireau, est en voie de disparition malgrès un taux de reproduction très elevé. Ce pokemon reste a ce jour un grand mystere.");
        $product5->setName("addelalalilabou");
        $product5->setActive(true);
        $product5->setPrice(47.2);
        $product5->setSupplierReference("dsgdfgdfgdg");
        $product5->setAvailableOrder(true);
        $product5->setCreatedAt(new \DateTime());
        $product5->setUpdatedAt(new \DateTime());

        $manager->persist($product1);
        $manager->persist($product2);
        $manager->persist($product3);
        $manager->persist($product4);
        $manager->persist($product5);

        $manager->flush();
    }
}