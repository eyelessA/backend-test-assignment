<?php

namespace App\Services\Task;

use Illuminate\Database\Eloquent\Builder;

class SearchService
{
    public function search(Builder $builder, array $data): Builder
    {
        if (isset($data['completed_at'])) {
            $builder->where('completed_at', $data['completed_at']);
        }

        if (isset($data['status'])) {
            switch ($data['status']) {
                case 'todo':
                    $builder->where('status', 'todo');
                    break;
                case 'completed':
                    $builder->where('status', 'completed');
                    break;
            }
        }
        return $builder;
    }
}