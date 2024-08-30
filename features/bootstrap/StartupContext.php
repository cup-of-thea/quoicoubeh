<?php

use Behat\Behat\Context\Context;
use Behat\Hook\BeforeScenario;
use Tests\TestCase;

class StartupContext extends TestCase implements Context
{
    public function __construct()
    {
        putenv('DB_DATABASE=testing');
        putenv('MONGO_DATABASE=testing');
        parent::SetUp();
    }

    #[BeforeScenario]
    public function before(): void
    {
        $this->artisan('migrate:fresh');
        //DB::connection('mongodb')->collection('likes')->delete();
    }
}