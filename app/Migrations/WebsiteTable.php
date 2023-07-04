<?php
namespace App\migrations;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

trait WebsiteTable
{
    public static function createTable()
    {
        // Get the table name from the model
        $table = (new static())->getTable();

        // Use the DB connection to create the table if it doesn't already exist
        if (!DB::connection()->getSchemaBuilder()->hasTable($table)) {
            DB::connection()->getSchemaBuilder()->create($table, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('url');
                $table->timestamps();
            });
            
            echo '<span style="color: green; font-weight: bold;">Websites table created successfully.</span><br>';
        } else {
            echo '<span style="color: red; font-weight: bold;">Websites table already exists.</span><br>';
        }
    }

    public static function updateTable()
    {
        // Get the table name from the model
        $table = (new static())->getTable();

        // Use the DB connection to modify the table
        DB::connection()->getSchemaBuilder()->table($table, function (Blueprint $table) {
            // Define the modifications to be made to the table structure
            // For example, adding or modifying columns
            $table->string('new_column')->nullable();
        });

        echo 'Websites table updated successfully';
    }
}
