<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->visit('/')
             ->see('Laravel');
    }

    public function testTwo()
    {
        $this->visit('/')
            ->click('Register')
            ->seePageIs('/register');
    }

    public function testThree()
    {
        $this->visit('/register')
            ->type('Walter', 'name')
            ->type('walter@csktech.com.br', 'email')
            ->type('default', 'password')
            ->type('default', 'password_confirmation')
            ->press('Register')
            ->seePageIs('/home');
    }
}
