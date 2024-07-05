<?php

namespace App\Services\Task;

use App\Http\Requests\Task\StoreRequest;
use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class StoreService
{
    public function store(StoreRequest $storeRequest): Model|Builder
    {
        $data = $storeRequest->validated();
        return Task::query()->create($data);
    }
}