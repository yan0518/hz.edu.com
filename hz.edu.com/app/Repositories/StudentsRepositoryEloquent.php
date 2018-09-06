<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\StudentsRepository;
use App\Models\Hz_Students;

/**
 * Class AdminUserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class StudentsRepositoryEloquent extends BaseRepository implements StudentsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Hz_Students::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
    }

    // public function create($data)
    // {
        
    // }
}
