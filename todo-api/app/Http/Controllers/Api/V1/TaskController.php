<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService)
    {
    }

    public function index(): AnonymousResourceCollection
    {
        return TaskResource::collection(Task::all());
    }

    public function store(TaskStoreRequest $request): TaskResource
    {
        $newlyAddedTask = $this->taskService->store($request->validated());
        return new TaskResource($newlyAddedTask);
    }

    public function show(Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    public function update(Request $request, Task $task): TaskResource
    {
        return new TaskResource($task);
    }

    public function destroy(string $id)
    {
        //
    }
}
