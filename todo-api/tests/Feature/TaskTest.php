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

    public function test_task_can_be_created(): void
    {
        $newTask = [
            'title'        => 'Initialize project',
            'is_completed' => false,
        ];

        $this->post(route('tasks.store'), $newTask)
            ->assertSuccessful(201);

        $this->assertDatabaseHas('tasks', $newTask);
    }
}
