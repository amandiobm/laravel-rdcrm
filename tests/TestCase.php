<?php

namespace Victorino\RdCrm\Tests;

use Dotenv\Dotenv;
use Faker\Factory;
use Orchestra\Testbench\TestCase as TestCaseOrchestra;
use Victorino\RdCrm\RdCrmFacade;
use Victorino\RdCrm\RdCrmServiceProvider;
use Victorino\RdCrm\Requests\Contact\Create as ContactCreate;
use Victorino\RdCrm\Requests\Deal\Create as DealCreate;
use Victorino\RdCrm\Requests\Organization\Create as OrganizationCreate;

class TestCase extends TestCaseOrchestra
{

    protected $faker;

    public function __construct(?string $name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->faker = Factory::create();
    }

    protected function getPackageProviders($app)
    {
        return [RdCrmServiceProvider::class];
    }

    protected function getApplicationAliases($app)
    {
        return ['RdCrm' => RdCrmFacade::class];
    }

    protected function getEnvironmentSetUp($app)
    {
        $dotenv = Dotenv::createImmutable(__DIR__, '../.env.testing');
        $dotenv->load();
        $app['config']->set("rdcrm.token", env('RDCRM_TOKEN'));
    }

    protected function getFakeOrganizationObject(): OrganizationCreate {
        $organization = new OrganizationCreate($this->faker->name);
        $organization->setResume($this->faker->text(20));
        $organization->setUrl($this->faker->url);
        return $organization;
    }

    protected function getFakeDealRequest(): DealCreate
    {
        $deal = new DealCreate($this->faker->name);
        $deal->setEmail($this->faker->email);
        return $deal;
    }

    protected function getFakeContactRequest(string $organization_id): ContactCreate
    {
        return new ContactCreate($this->faker->name, $organization_id);
    }
}

