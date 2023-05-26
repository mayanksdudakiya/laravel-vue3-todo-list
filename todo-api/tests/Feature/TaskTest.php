<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    public function test_tasks_screen_should_be_rendereed(): void
    {
        $response = $this->get(route('tasks.index'));
        $response->assertStatus(200);
    }
}
