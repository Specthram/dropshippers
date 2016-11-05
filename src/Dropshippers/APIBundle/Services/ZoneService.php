<?php
/**
 * Created by PhpStorm.
 * User: anthony
 * Date: 05/11/16
 * Time: 18:54
 */

namespace Dropshippers\APIBundle\Services;


use Doctrine\Bundle\DoctrineBundle\Registry;
use Dropshippers\APIBundle\Entity\Zone;

class ZoneService
{
    private $doctrine;

    private $zoneRepository;

    public function __construct(Registry $doctrine)
    {
        //inject doctrine at construction
        $this->doctrine         = $doctrine;
        $this->zoneRepository   = $this->doctrine->getRepository('DropshippersAPIBundle:Zone');
    }

    public function constructZoneStandardArray()
    {
        $results            = $this->zoneRepository->findAll();
        $tab                = [];

        foreach ($results as $result){
            $countries  = $result->getCountries();

            foreach($countries as $country) {
                $countryTab = [];
                $countryTab['countryRef']   = $country->getId();
                $countryTab['name']         = $country->getName();
                $countryTab['isoCode']      = $country->getIsoCode();

                $tab['zones'][$result->getName()][] = $countryTab;
            }
        }

        return $tab;
    }
}