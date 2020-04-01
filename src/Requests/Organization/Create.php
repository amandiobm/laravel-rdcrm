<?php


namespace Victorino\RdCrm\Requests\Organization;


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
    protected $resume;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var array
     */
    protected $organization_custom_fields = [];

    /**
     * @var array
     */
    protected $organization_segments = [];

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
    public function getResume(): string
    {
        return $this->resume;
    }

    /**
     * @param string $resume
     */
    public function setResume(string $resume): void
    {
        $this->resume = $resume;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getOrganizationCustomFields(): array
    {
        return $this->organization_custom_fields;
    }

    /**
     * Example:
     *  [
     *   ["custom_field_id": "ID_DO_CAMPO_PERSONALIZADO", "value": "VALOR_DO_CAMPO"],
     *   ["custom_field_id": "ID_DO_CAMPO_PERSONALIZADO", "value": "VALOR_DO_CAMPO"]
     *  ]
     * @param array $organization_custom_fields
     */
    public function setOrganizationCustomFields(array $organization_custom_fields): void
    {
        $this->organization_custom_fields = $organization_custom_fields;
    }

    /**
     * @return array
     */
    public function getOrganizationSegments(): array
    {
        return $this->organization_segments;
    }

    /**
     * Example
     * ["NOME_DO_SEGMENTO1", "NOME_DO_SEGMENTO2"]
     * @param array $organization_segments
     */
    public function setOrganizationSegments(array $organization_segments): void
    {
        $this->organization_segments = $organization_segments;
    }


}
