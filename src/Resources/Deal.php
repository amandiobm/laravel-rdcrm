<?php


namespace Victorino\RdCrm\Resources;


use GuzzleHttp\Exception\RequestException;
use Victorino\RdCrm\Exceptions\DealCreationExeption;
use Victorino\RdCrm\Requests\Deal\Create as CreateDeal;
use Victorino\RdCrm\Responses\Deal\Create as CreateResponse;

class Deal extends Resource
{
    protected $user;

    protected $organization_id;

    public function withUser(string $user ): Deal {
        $this->user = $user;
        return $this;
    }

    public function withOrganizationId(string $id ): Deal {
        $this->organization_id = $id;
        return $this;
    }

    public function create(CreateDeal $deal) {

        if (empty($this->user)) {
            throw new DealCreationExeption('Please inform an user');
        }

        if (empty($this->organization_id)) {
            throw new DealCreationExeption('Please inform an organization id');
        }

        $organization = new \StdClass;
        $organization->_id = $this->organization_id;

        $data = [
            'user' => $this->user,
            'organization' => $organization,
            'deal' => $deal->toArray()
        ];
        $response = $this->post('deals', $data);
        $objectToResponse = new CreateResponse();
        $objectToResponse->map($response);
        return $objectToResponse;
    }
}
