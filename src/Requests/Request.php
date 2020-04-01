<?php


namespace Victorino\RdCrm\Requests;


abstract class Request
{

    function toArray() {
        $reflectionClass = new \ReflectionClass(get_class($this));
        $array = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($this);
            $property->setAccessible(false);
        }
        return $array;
    }
}
