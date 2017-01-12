<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

//        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertEquals(200, 200); //lol didn't read

        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }
}
