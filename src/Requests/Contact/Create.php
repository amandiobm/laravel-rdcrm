<?php


namespace Victorino\RdCrm\Requests\Contact;


use Victorino\RdCrm\Requests\Email;
use Victorino\RdCrm\Requests\Phone;
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
    protected $title;

    /**
     * @var string;
     */
    protected $notes;

    /**
     * @var string
     */
    protected $organization_id;

    /**
     * @var array
     */
    protected $emails = [];

    /**
     * @var array
     */
    protected $phones = [];

    /**
     * @var array
     */
    protected $deal_ids = [];

    public function __construct(string $name, string $organization_id)
    {
        $this->name = $name;
        $this->organization_id = $organization_id;
    }

    /**
     * @return array
     */
    public function getEmails(): array
    {
        return $this->emails;
    }

    /**
     * @param Email $email
     */
    public function addEmail(Email $email): void
    {
        $this->emails[] = $email;
    }

    /**
     * @return array
     */
    public function getPhones(): array
    {
        return $this->phones;
    }

    /**
     * @param Phone $phone
     */
    public function addPhone(Phone $phone): void
    {
        $this->phones[] = $phone;
    }

    /**
     * @return array
     */
    public function getDealIds(): array
    {
        return $this->deal_ids;
    }

    /**
     * @param string $deals_id
     */
    public function addDealId(string $deal_ids): void
    {
        $this->deal_ids[] = $deal_ids;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getOrganizationId(): string
    {
        return $this->organization_id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getNotes(): string
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     */
    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }




}
