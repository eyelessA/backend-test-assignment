<?php

namespace App\Services\Task;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

readonly class IndexService
{
    public function __construct(
        private SortingService $sortingService,
        private SearchService $searchService,
    )
    {
    }

    public function index($data): Collection|array
    {
        $builder = Task::query();
        $builder = $this->searchService->search($builder, $data);
        $builder = $this->sortingService->orderByApply($builder, $data);

        return $builder->get();
    }
}