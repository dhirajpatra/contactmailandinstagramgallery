<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GalleryTest extends TestCase
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
     * this will test whether gallery login form is displaying or not
     */
    public function testIndex()
    {
        $response = $this->call('GET', '/gallery');

        $this->assertEquals(200, $response->status());
    }
}
