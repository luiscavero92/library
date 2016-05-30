<?php
namespace AppBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Doctrine\DBAL\DBALException;

class DoctrineExceptionListener
{
     public function onPdoException(GetResponseForExceptionEvent $event)
     {
          $exception = $event->getException();
          if ($exception instanceof DBALException) {
              exit();
          }
     }
}