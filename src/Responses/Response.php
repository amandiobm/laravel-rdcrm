<?php


namespace Victorino\RdCrm\Responses;


abstract class Response
{
    public function map($data) {
        foreach ($data AS $key => $value) $this->{$key} = $value;
    }
}
