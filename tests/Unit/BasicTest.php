<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BasicTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHasItemInBasket()
    {
        $basket = collect(['item_one', 'item_two', 'item_three']);
        $this->assertTrue($basket->contains('item_one'));
        // $this->assertTrue($basket->contains('item_four'));
        $this->assertTrue(true);
    }

    // public function testTakeOneFromTheBasket()
    // {
    //     $basket = collect(['item_three']);
    //     $this->assertEquals('item_three', $basket[0]);
    //     $this->assertNull($basket->forget(0)); // false
    // }
}
