<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TodoTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->type('new_todo', 'Todo 1')
                ->click('input[type="submit"]')
                ->assertSee('Todo 1')
                ->type('new_todo', 'Todo 2')
                ->click('input[type="submit"]')
                ->assertSee('Todo 1')
                ->assertSee('Todo 2');
        });
    }
}
