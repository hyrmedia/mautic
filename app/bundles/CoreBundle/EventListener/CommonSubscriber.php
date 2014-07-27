<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic, NP. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.com
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\CoreBundle\EventListener;

use Mautic\ApiBundle\Event as ApiEvents;
use Mautic\CoreBundle\Factory\MauticFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Mautic\CoreBundle\Event as MauticEvents;

/**
 * Class CoreSubscriber
 *
 * @package Mautic\CoreBundle\EventListener
 */
class CommonSubscriber implements EventSubscriberInterface
{
    protected $request;
    protected $templating;
    protected $serializer;
    protected $security;
    protected $securityContext;
    protected $dispatcher;
    protected $factory;
    protected $params;
    protected $translator;


    public function __construct (MauticFactory $factory)
    {
        $this->factory         = $factory;
        $this->templating      = $factory->getTemplating();
        $this->request         = $factory->getRequest();
        $this->security        = $factory->getSecurity();
        $this->securityContext = $factory->getSecurityContext();
        $this->serializer      = $factory->getSerializer();
        $this->params          = $factory->getSystemParameters();
        $this->dispatcher      = $factory->getDispatcher();
        $this->translator      = $factory->getTranslator();
    }

    static public function getSubscribedEvents ()
    {
        return array();
    }

    /**
     * @param MenuEvent $event
     */
    public function onBuildMenu (MauticEvents\MenuEvent $event)
    {
        //check common place
        $path = $this->getSubscriberDirectory() . "/../Config/menu/main.php";
        if (!file_exists($path)) {
            //else check for just a menu.php file
            $path = $this->getSubscriberDirectory() . "/../Config/menu.php";
        }

        if (file_exists($path)) {
            $security = $event->getSecurity();
            $request  = $this->factory->getRequest();
            $items    = include $path;
            $event->addMenuItems($items);
        }
    }

    /**
     * @param MenuEvent $event
     */
    public function onBuildAdminMenu (MauticEvents\MenuEvent $event)
    {
        $path  = $this->getSubscriberDirectory() . "/../Config/menu/admin.php";
        if (file_exists($path)) {
            $security = $event->getSecurity();
            $request  = $this->factory->getRequest();
            $items    = include $path;
            $event->addMenuItems($items);
        }
    }

    /**
     * @param RouteEvent $event
     */
    public function onBuildRoute (MauticEvents\RouteEvent $event)
    {
        $routing = $this->getSubscriberDirectory() .  "/../Config/routing.php";
        if (file_exists($routing)) {
            $event->addRoutes($routing);
        } else {
            $routing = $this->getSubscriberDirectory() .  "/../Config/routing/routing.php";
            if (file_exists($routing)) {
                $event->addRoutes($routing);
            }
        }
    }

    /**
     * @param RouteEvent $event
     */
    public function onBuildApiRoute(ApiEvents\RouteEvent $event)
    {
        $routing = $this->getSubscriberDirectory() .  "/../Config/routing/api.php";
        if (file_exists($routing)) {
            $routing = $this->getSubscriberDirectory() .  "/../Config/routing/routing.php";
            $event->addRoutes($routing);
        }
    }


    protected function getSubscriberDirectory()
    {
        $reflection = new \ReflectionClass($this);
        $directory = dirname($reflection->getFileName());
        return $directory;
    }
}