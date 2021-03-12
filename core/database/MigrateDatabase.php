<?php

namespace App\Core\Database;

use App\Core\App;
use App\Core\Database\QueryBuilder;

/**
 * Check for files which holds database queries to create scheme's
 * @param $dropTable (default = false) set to true to drop all tables and create it again
 */

class MigrateDatabase
{
    protected static $dropTable;

    protected static $seed;

    public static function migrate($dropTable, $seed)
    {
        self::$dropTable = $dropTable;
        self::$seed = $seed;

        self::start();
    }
    
    private static function start()
    {
        // get files from current directory
        $files = scandir(__DIR__ . "/migrations/", SCANDIR_SORT_ASCENDING);

        if (count($files) > 1) {
            foreach ($files as $file) {
                // skip files that doesn't represent migration data
                if (trim(strtolower($file)) !== 'migrate.php' && $file !== '.' && $file !== '..') {
                    $migrationData = require_once __DIR__ . "/migrations/" . $file;

                    if (self::$dropTable) {
                        QueryBuilder::query($migrationData['drop_scheme']);
                    }

                    QueryBuilder::query($migrationData['scheme']);

                    if (self::$seed && isset($migrationData['seeder'])) {
                        if ($migrationData['seeder']['type'] == 'array') {
                            foreach ($migrationData['seeder']['data'] as $seed) {
                                QueryBuilder::insert($migrationData['table_name'], $seed);
                            }
                        } elseif ($migrationData['seeder']['type'] == 'sql') {
                            QueryBuilder::query($migrationData['seeder']['data']);
                        }
                    }
                }
            }
        }
    }
}
