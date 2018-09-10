<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Todo;

class TodoTest extends TestCase
{
    use RefreshDatabase;

    public function testExample()
    {
        $todo = new Todo();
        $todo->label = 'Todo 1';
        $todo->save();

        $this->assertDatabaseHas('todos', [
            'label' => 'Todo 1'
        ]);
    }
}
