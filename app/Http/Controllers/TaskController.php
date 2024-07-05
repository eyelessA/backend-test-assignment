<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\IndexRequest;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Task;
use App\Services\Task\IndexService;
use App\Services\Task\StoreService;
use App\Services\Task\UpdateService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TaskController extends Controller
{
    public function index(IndexRequest $indexRequest, IndexService $indexService): AnonymousResourceCollection
    {
        $data = $indexRequest->validated();
        $tasks = $indexService->index($data);
        return TaskResource::collection($tasks);
    }

    public function store(StoreRequest $storeRequest, StoreService $storeService): TaskResource
    {
        $task = $storeService->store($storeRequest);
        return TaskResource::make($task);
    }

    public function show(Task $task): TaskResource
    {
        return TaskResource::make($task);
    }

    public function update(UpdateRequest $updateRequest, UpdateService $updateService, Task $task): TaskResource
    {
        $data = $updateRequest->validated();
        $task = $updateService->update($data, $task);
        return TaskResource::make($task);
    }

    public function destroy(Task $task): void
    {
        $task->delete();
    }
}
