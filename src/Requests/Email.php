<?php


namespace Victorino\RdCrm\Requests;


class Email
{

    /**
     * @var string
     */
    public $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }
}
