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
    private $langRepository;

    public function __construct(Registry $doctrine)
    {
        //inject doctrine at construction
        $this->doctrine                     = $doctrine;
        $this->categoryLocaleRepository     = $this->doctrine->getRepository('DropshippersAPIBundle:CategoryLocale');
        $this->categoryRepository           = $this->doctrine->getRepository('DropshippersAPIBundle:Category');
        $this->langRepository               = $this->doctrine->getRepository('DropshippersAPIBundle:Lang');
    }

    public function constructCategoryStandardArray($locale)
    {
        $results            = $this->categoryRepository->findBy(['parent' => null]);
        $lang               = $this->langRepository->findOneBy(["languageCode" => $locale]);
        $tab                = [];
        $tab ['locale']     = $lang->getLanguageCode();

        foreach ($results as $result){
            $categoryTab = $this->normalizeCategory($result, $lang);
            $tab['categories'][] = $categoryTab;
        }

        return $tab;
    }

    public function checkLocaleExists($locale)
    {
        $categoryLocaleRepository   = $this->doctrine->getRepository('DropshippersAPIBundle:CategoryLocale');
        $langRepository             = $this->doctrine->getRepository('DropshippersAPIBundle:Lang');

        $lang                       = $langRepository->findOneBy(["languageCode" => $locale]);
        if ($lang) {
            $locale = $categoryLocaleRepository->findOneBy(["language" => $lang]);
            if ($locale) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function normalizeCategory(Category $category, $lang)
    {
        $categoryTab = [];

        $categoryTab['categoryRef'] = $category->getId();
        $categoryTab['name']        = $this->categoryLocaleRepository->findOneBy(["category" => $category->getId(), 'language' => $lang])->getName();

        $children = $category->getChildren();

        if ($children){
            foreach ($children as $child){
                $categoryTabb = $this->normalizeCategory($child, $lang);
                $categoryTab['children'][]    = $categoryTabb;
            }
        }

        return $categoryTab;
    }

}