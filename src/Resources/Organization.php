<?php


namespace Victorino\RdCrm\Resources;


use Victorino\RdCrm\Requests\Organization\Create;
use Victorino\RdCrm\Responses\Organization\Create as CreateResponse;
use Victorino\RdCrm\Responses\Response;

class Organization extends Resource
{

    public function create(Create $request): CreateResponse {
        $response = $this->post('organizations', $request->toArray());
        $objectToResponse = new CreateResponse();
        $objectToResponse->map($response);
        return $objectToResponse;
    }


}
