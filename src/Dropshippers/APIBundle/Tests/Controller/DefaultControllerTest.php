<?php

namespace Dropshippers\APIBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        //$crawler = $client->request('GET', '/');

        //$this->assertContains('Hello World', $client->getResponse()->getContent());

        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent('hacked by specthram lol');

        $this->assertContains('Hello World', $response->getContent());
    }
}
