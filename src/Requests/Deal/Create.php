<?php


namespace Victorino\RdCrm\Requests\Deal;

use Victorino\RdCrm\Requests\CustomFields;
use Victorino\RdCrm\Requests\Request;

class Create extends Request
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var array
     */
    protected $deal_custom_fields;

    /**
     * Create constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return array
     */
    public function getDealCustomFields(): array
    {
        return $this->deal_custom_fields;
    }

    /**
     * @param CustomFields[] $deal_custom_fields
     */
    public function setDealCustomFields(array $deal_custom_fields): void
    {
        $this->deal_custom_fields = $deal_custom_fields;
    }


}
