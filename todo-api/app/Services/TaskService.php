<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function store(array $newTask): Task
    {
        return Task::create($newTask);
    }
}
