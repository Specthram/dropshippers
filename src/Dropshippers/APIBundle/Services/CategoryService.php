<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 08/10/16
 * Time: 16:08
 */

namespace Dropshippers\APIBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry;
use Dropshippers\APIBundle\Entity\Category;

class CategoryService
{
    private $doctrine;
    private $categoryLocaleRepository;
    private $categoryRepository;

    public function __construct(Registry $doctrine)
    {
        //inject doctrine at construction
        $this->doctrine                     = $doctrine;
        $this->categoryLocaleRepository     = $this->doctrine->getRepository('DropshippersAPIBundle:CategoryLocale');
        $this->categoryRepository           = $this->doctrine->getRepository('DropshippersAPIBundle:Category');
    }

    public function constructCategoryStandardArray($locale)
    {
        $results = $this->categoryRepository->findBy(['parent' => null]);
        $tab = [];
        $tab ['locale'] = $locale;

        foreach ($results as $result){
            list( , , $categoryTab) = $this->normalizeCategory($result, $locale);
            $tab['categories'][] = $categoryTab;
        }

        return $tab;
    }

    public function checkLocaleExists($locale)
    {
        $categoryLocaleRepository = $this->doctrine->getRepository('DropshippersAPIBundle:CategoryLocale');
        return $categoryLocaleRepository->checkLocaleExists($locale);
    }

    public function normalizeCategory(Category $category, $locale)
    {
        $categoryTab = [];


        $categoryTab['categoryRef'] = $category->getId();
        $categoryTab['name']        = $this->categoryLocaleRepository->findOneBy(["category" => $category->getId(), 'language' => $locale])->getName();

        $children = $category->getChildren();

        if ($children){
            foreach ($children as $child){
                list( , , $categoryTabb) = $this->normalizeCategory($child, $locale);
                $categoryTab['children'][]    = $categoryTabb;
            }
        }

        return [$category, $locale, $categoryTab];
    }

}