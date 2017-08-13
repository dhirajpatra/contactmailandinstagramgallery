<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuestionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Test the form is creating and showing
     */
    public function testCreate()
    {
        $response = $this->call('GET', '/contact');

        $this->assertEquals(200, $response->status());
    }

    /**
     * Test to check contact us form saving data
     *
     */
    public function testStore()
    {
        $response = $this->post('/contact', ['name' => 'Taylor', 'email' => 'taylorswift@gmailc.com', 'message' => 'this is test message']);
        $this->assertDatabaseHas('questions', ['email' => 'taylorswift@gmailc.com']);

    }

}
