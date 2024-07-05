<?php

namespace App\Services\Task;

use Illuminate\Database\Eloquent\Builder;

class SortingService
{
    public function orderByApply(Builder $builder, array $data): Builder
    {
        if (isset($data['order_by'])) {
            switch ($data['order_by']) {
                case 'completed_at_desc':
                    $builder->orderBy('completed_at', 'desc');
                    break;
                case 'completed_at_asc':
                    $builder->orderBy('completed_at', 'asc');
                    break;
                case 'status_desc':
                    $builder->orderBy('status', 'desc');
                    break;
                case 'status_asc':
                    $builder->orderBy('status', 'asc');
                    break;
            }
        }
        return $builder;
    }
}
