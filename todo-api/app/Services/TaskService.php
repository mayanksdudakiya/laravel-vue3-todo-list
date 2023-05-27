<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function store(array $newTask): Task
    {
        return Task::create($newTask);
    }

    public function update(array $updatedTask, Task $task): bool
    {
        return $task->update($updatedTask);
    }
}
