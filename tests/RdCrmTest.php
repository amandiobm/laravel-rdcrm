<?php


namespace Victorino\RdCrm\Tests;

use Victorino\RdCrm\Requests\CustomFields;
use Victorino\RdCrm\Requests\Email;
use Victorino\RdCrm\Requests\Phone;
use Victorino\RdCrm\Resources\Contact;
use Victorino\RdCrm\Resources\Deal;
use Victorino\RdCrm\Resources\Organization;
use Victorino\RdCrm\Responses\Deal\Create as CreateDealResponse;
use Victorino\RdCrm\Responses\Organization\Create;

class RdCrmTest extends TestCase
{

    /**
     * @test
     */
    public function it_will_create_organization() {
        /**
         * @var $organizationResource Organization
         */
        $organizationResource = \RdCrm::organizations();

        $organization = $this->getFakeOrganizationObject();

        $response  = $organizationResource->create($organization);

        $this->assertInstanceOf(Create::class, $response);

        $this->assertObjectHasAttribute('_id', $response);
        $this->assertObjectHasAttribute('name', $response);
        $this->assertObjectHasAttribute('resume', $response);
        $this->assertObjectHasAttribute('url', $response);

        $this->assertEquals($organization->getResume(), $response->resume);
        $this->assertEquals($organization->getUrl(), $response->url);

    }

    /**
     * @test
     */
    public function it_will_create_deal() {
        /**
         * @var $organizationResource Organization
         */
        $organizationResource = \RdCrm::organizations();

        $organization = $this->getFakeOrganizationObject();

        $response  = $organizationResource->create($organization);

        /**
         * @var $dealsResource Deal
         */
        $dealsResource = \RdCrm::deals();

        $deal = $this->getFakeDealRequest();

        $deal->setDealCustomFields([
            new CustomFields("5d02637279d0780010be9266", "Foo"),
            new CustomFields("5db6e31e726ad40010fbc6a1", "Bar"),
            new CustomFields("5c910428c278e60022d2298f", "Mesage"),
        ]);

        $deal = $dealsResource->withOrganizationId($organization->_id)
            ->withUser('USERNAME')
            ->create($deal);

        $this->assertInstanceOf(CreateDealResponse::class, $response);

        $this->assertObjectHasAttribute('_id', $response);
        $this->assertObjectHasAttribute('name', $response);
    }

    /**
     * @test
     */
    public function it_will_create_contact() {
        /**
         * @var $organizationResource Organization
         */
        $organizationResource = \RdCrm::organizations();

        $organization = $this->getFakeOrganizationObject();

        $organization  = $organizationResource->create($organization);

        /**
         * @var $dealsResource Deal
         */
        $dealsResource = \RdCrm::deals();

        $deal = $this->getFakeDealRequest();

        $deal->setDealCustomFields([
            new CustomFields("5d02637279d0780010be9266", "Foo"),
            new CustomFields("5db6e31e726ad40010fbc6a1", "Bar"),
            new CustomFields("5c910428c278e60022d2298f", "Mesage"),
        ]);

        $deal = $dealsResource->withOrganizationId($organization->_id)
            ->withUser('USERNAME')
            ->create($deal);

        /**
         * @var $dealsResource Contact
         */
        $contactResource = \RdCrm::contacts();

        $contact = $this->getFakeContactRequest($organization->_id);
        $contact->addEmail(new Email($this->faker->email));
        $contact->addPhone(new Phone($this->faker->phoneNumber));
        $contact->addDealId($deal->_id);

        $response = $contactResource->create($contact);

        $this->assertInstanceOf(CreateDealResponse::class, $response);

        $this->assertObjectHasAttribute('_id', $response);
        $this->assertObjectHasAttribute('name', $response);
    }
}
