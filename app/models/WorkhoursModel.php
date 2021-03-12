<?php

namespace App\Models;

class WorkhoursModel extends Model
{
    // Name of the table
    protected $model = "workhours";

    // Max number of records when fetching all records from table
    protected $limit;

    // Non writable fields
    protected $protectedFields = [
        'id',
        'updated',
        'deleted',
    ];

    public function __construct()
    {
        parent::__construct(
            $this->model,
            $this->limit,
            $this->protectedFields,
            WorkhoursModel::class
        );
    }
}

new WorkhoursModel;
