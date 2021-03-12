<?php

namespace App\Models;

use App\Core\Database\QueryBuilder;
use PDO;

class FilesModel extends Model
{
    // Name of the table
    protected $model = "files";

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
            FilesModel::class
        );
    }

    /**
     * Fetch all rows belonging to a file
     * @return array of objects
     */
    public function rows()
    {
        $sql = "SELECT * FROM workhours WHERE deleted IS NULL AND file_id={$this->id}";

        return QueryBuilder::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }
}

new FilesModel;
