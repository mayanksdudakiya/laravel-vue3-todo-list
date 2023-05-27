<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

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

    public function test_task_title_should_be_required_while_creating_task(): void
    {
        $newTask = [
            'title' => '',
        ];

        $this->post(route('tasks.store'), $newTask)
            ->assertStatus(422);
    }

    public function test_task_title_minimum_length(): void
    {
        $newTask = [
            'title' => 'min',
        ];

        $this->post(route('tasks.store'), $newTask)
            ->assertStatus(422);
    }

    public function test_task_title_maximum_length(): void
    {
        $newTask = [
            'title' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has sur",
        ];

        $this->post(route('tasks.store'), $newTask)
            ->assertStatus(422);
    }

    public function test_task_is_completed_field_value_must_be_false_while_task_creation(): void
    {
        $newTask = [
            'title'        => "Lorem Ipsum is simply dummy text",
            'is_completed' => true
        ];

        $this->post(route('tasks.store'), $newTask)
            ->assertStatus(422);
    }

    public function test_tasks_can_be_indexed(): void
    {
        Task::factory(10)->create();

        $this->get(route('tasks.index'))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'is_completed',
                    ]
                ]
            ])
            ->assertJsonCount(10, 'data');
    }

    public function test_task_can_be_shown(): void
    {
        $task = Task::factory()->create();

        $this->get(route('tasks.show', $task->id))
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'is_completed',
                ]
            ]);
    }

    public function test_task_can_be_updated(): void
    {
        $task = Task::factory()->create();

        $updatedTask = [
            'title'        => 'updated task',
            'is_completed' => true,
        ];

        $this->put(route('tasks.update', $task->id), $updatedTask)
            ->assertStatus(200)
            ->assertExactJson([
                'data' => [
                    'id' => $task->id,
                    'title' => $updatedTask['title'],
                    'is_completed' => $updatedTask['is_completed'],
                ]
            ]);

        $task->refresh();

        $this->assertEquals($updatedTask['title'], $task->title);
        $this->assertEquals($updatedTask['is_completed'], $task->is_completed);
    }

    public function test_task_can_be_deleted(): void
    {
        $task = Task::factory()->create();

        $this->assertModelExists($task);

        $this->delete(route('tasks.destroy', $task->id))
            ->assertStatus(200);

        $this->assertModelMissing($task);
    }
}
