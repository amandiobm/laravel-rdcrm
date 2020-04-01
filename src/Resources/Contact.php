<?php


namespace Victorino\RdCrm\Resources;



use Victorino\RdCrm\Requests\Contact\Create as CreateContactRequest;
use Victorino\RdCrm\Responses\Contact\Create as CreateContactResponse;

class Contact extends Resource
{

    public function create(CreateContactRequest $request): CreateContactResponse
    {
        $response = $this->post('contacts', $request->toArray());
        $objectToResponse = new CreateContactResponse();
        $objectToResponse->map($response);
        return $objectToResponse;
    }
}
