<?php

namespace Victorino\RdCrm;

use Victorino\RdCrm\Resources\Contact;
use Victorino\RdCrm\Resources\Deal;
use Victorino\RdCrm\Resources\Organization;

class RdCrm
{
    public function organizations() {
        return new Organization();
    }

    public function deals(){
        return new Deal();
    }

    public function contacts(){
        return new Contact();
    }
}
