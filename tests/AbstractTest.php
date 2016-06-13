<?php

namespace Sheepla\Test;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Serializer
     */
    public static $serializer;

    public static function setUpBeforeClass()
    {
        // register jms annotation namespace
        AnnotationRegistry::registerAutoloadNamespace('JMS\Serializer\Annotation', 'vendor/jms/serializer/src');

        self::$serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build();
    }

}