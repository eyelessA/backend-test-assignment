<?php

namespace App\Services\Task;

use App\Models\Task;

class UpdateService
{
    public function update(array $data, Task $task): Task
    {
        $task->update($data);
        return $task;
    }
}