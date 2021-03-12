<?php

namespace App\Core\Database;

use PDO;
use PDOException;

class QueryBuilder
{
    private static $lastInsertId;

    private static function connect()
    {
        $dbHost = $_ENV['DB_HOST'];
        $dbName = $_ENV['DB_NAME'];
        $dbUser = $_ENV['DB_USER'];
        $dbPass = $_ENV['DB_PASS'];
        
        try {
            $dbh = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPass);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        return $dbh;
    }
    
    public static function query($query, $executeString = array())
    {
        $dbh = self::connect();
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $stmt = $dbh->prepare($query);
            $stmt->execute($executeString);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }

        self::$lastInsertId = $dbh->lastInsertId();

        return $stmt;
    }

    /**
     * Insert data into the database
     * @param $table string: the table to insert into
     * @param $data array: a associative array with columns and values
     */
    public static function insert($table, $data)
    {
        $query = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($data)),
            ':' . implode(', :', array_keys($data))
        );
        
        self::query($query, $data);

        return self::$lastInsertId;
    }

    /**
     * Create an update query to update a record in the database
     * @param $data array: associative array with columns and values
     * @param $table string: the table to update
     * @param $id int: the id of the record to update
     */
    public static function update($table, $data, $id)
    {
        $setStr = '';
        $params = array();

        foreach ($data as $col => $val) {
            if (trim(strtolower($col)) === 'id') {
                continue;
            }
            
            $setStr .= "{$col} = :{$col},";
            $params[$col] = $val;
        }

        $setStr = rtrim($setStr, ",");

        $params['id'] = $id;
        $query = "UPDATE {$table} SET {$setStr} WHERE id = :id";
        self::query($query, $params);
    }

    public static function delete($id, $table)
    {
        $query = "SELECT deleted FROM $table WHERE id= $id AND deleted IS NULL";
        $data = self::query($query)->fetch(PDO::FETCH_ASSOC);

        if ($data !== false) {
            $data['deleted'] = date('Y-m-d H:i:s');
            self::update($table, $data, $id);
        }
    }
}
