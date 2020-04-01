<?php


namespace Victorino\RdCrm\Requests;


class Phone
{

    /**
     * @var string
     */
    public $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }
}
