<?php

namespace Dropshippers\APIBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class ResponseListener
{
    public function onKernelResponse(FilterResponseEvent $event)
    {
        $request = $event->getRequest();

        // only do something on some situations
        //if (false === strpos($request->headers->get('Foobar'), 'barfoo')) {
        //    return;
        //}

        // set the custom header of the response
        $event->getResponse()->headers->set('Access-Control-Allow-Origin', 'true');
        $event->getResponse()->headers->set('Access-Control-Allow-Headers', 'Origin, Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers, auth-token');
        $event->getResponse()->headers->set('Access-Control-Allow-Credentials', '*');
        $event->getResponse()->headers->set('Access-Control-Allow-Methods', 'GET,OPTIONS,POST,PUT,DELETE');
    }
}
