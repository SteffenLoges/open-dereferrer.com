<?php

namespace OpenDereferrer;

class SingletonFactory
{

    private static $instances = [];

    final public static function i($instanceName = 'MAIN')
    {

        $className = get_called_class();

        if (!isset(self::$instances[$className][$instanceName])) {

            $args = func_get_args();

            $reflection = new \ReflectionClass($className);

            $instance = $reflection->newInstanceArgs($args);

            self::$instances[$className][$instanceName] = $instance;

        }

        return self::$instances[$className][$instanceName];

    }

}