# Model & Migrations
You need to know laravel model migration concept to understand this structure. Although its not Laravel but I have used the **illuminate/database** package for maintaining database and model-migration.

***[Note: There is no command. You have to manually create files and need to write code manually]***

### Step 1 (Model Creation):
(Suppose We want to create a table call **users**)

 1. Create a folder inside `app/Models` called `User`
 2. Create a file inside that `app/Models/User` folder called `User.php`
 3. Write following code: 
 ```php
 <?php
namespace App\Models\User;

use App\migrations\UserTable;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Traits\UserRelations;

class User extends Model {
	use UserTable, UserRelations;

	protected $table = 'users';
}
```
 4. Create a Trait for Eloquent Relationship in `app/Models/User/Traits` folder called `UserRelations.php` and write follwoing code:
 ```php
<?php
namespace App\Models\User\Traits;

use App\Models\Post\Post;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UserRelations
{
	public function posts(): HasMany 
	{
		return $this->hasMany(Post::class);
	}
}
```

### Step 2 (Create Migration Trait):
1. Create `UserTable.php` file inside `app/Migrations` folder.
2. Write following code over there:
```php
<?php
namespace App\migrations;

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Database\Schema\Blueprint;

trait UserTable
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
				$table->string('email');
				$table->string('password');
				$table->timestamps();
			});

			echo '<span style="color: green; font-weight: bold;">Users table created successfully.</span><br>';
		} else {
			echo '<span style="color: red; font-weight: bold;">Users table already exists.</span><br>';
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

		echo 'Users table updated successfully';
	}
}
```

### Step 3 (Running Migrations):
1. Go to `app/Controllers/Migrations/MigrationController.php`.
2. Write Following Line into `create()` method:
```php
<?php
namespace App\Controllers\Migrations;

use App\Models\User\User;
use App\Models\Post\Post;

class MigrationController {
	public function create() {
		User::createTable();
		Post::createTable();

		dd('Migration Created');
	}
}
```
3. Go to `http://localhost:8000/migration/create` route to run the migrations. (it will create 2 table **users** and **posts** inside your database that you selected in your `.env` file as **DB_DATABASE**)
