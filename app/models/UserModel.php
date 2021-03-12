<?php

namespace App\Models;

use App\Core\Database\QueryBuilder;
use PDO;

class UserModel extends Model
{
    // Name of the table
    protected $model = "users";

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
            UserModel::class
        );
    }

    /**
     * Fetch all files belong to a user
     * @return array of objects
     */
    public function files()
    {
        $sql = "SELECT * FROM files WHERE deleted IS NULL AND user_id={$_SESSION['user']['id']}";

        return QueryBuilder::query($sql)->fetchAll(PDO::FETCH_CLASS);
    }


    /**
     * Check if a user exists
     * @return boolean
     */
    public static function exists($email, int $id = null)
    {
        $query = "SELECT id FROM users WHERE email='{$email}'";

        $result = QueryBuilder::query($query)->fetch();

        return $result !== false;
    }

    /**
     * Write user data to SESSION
     */
    public static function setUserSession(array $data)
    {
        $_SESSION['user'] = [
            'id'         => $data['id'],
            'name' => $data['name'],
            'email'  => $data['email'],
        ];
    }
}

new UserModel;
