<?php


namespace Victorino\RdCrm\Requests;


class CustomFields
{
    /**
     * @var string
     */
    public $custom_field_id;

    /**
     * @var string
     */
    public $value;

    public function __construct(string $custom_field_id, string $value)
    {
        $this->custom_field_id = $custom_field_id;
        $this->value = $value;
    }
}
