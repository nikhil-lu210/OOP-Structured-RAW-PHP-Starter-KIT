<?php
namespace App\Migrations;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

trait PostTable
{
    public static function createTable()
    {
        // Get the table name from the model
        $table = (new static())->getTable();

        // Use the DB connection to create the table if it doesn't already exist
        if (!DB::connection()->getSchemaBuilder()->hasTable($table)) {
            DB::connection()->getSchemaBuilder()->create($table, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('website_id');
                $table->string('title');
                $table->text('description');
                $table->timestamps();

                // Add foreign key constraint
                $table->foreign('website_id')->references('id')->on('websites');
            });

            echo '<span style="color: green; font-weight: bold;">Posts table created successfully.</span><br>';
        } else {
            echo '<span style="color: red; font-weight: bold;">Posts table already exists.</span><br>';
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
