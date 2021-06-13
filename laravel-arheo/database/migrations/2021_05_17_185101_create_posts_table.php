<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->integer('finds_quantity')->default(1);
            $table->date('date_of_detection');
            $table->foreignId('village_id')->constrained('villages');

            $table->string('involved_person')->nullable();

            $table->text('location_area');
            $table->float('location_square', 5, 2);





            $table->text('description')->nullable();

            $table->timestamps();
        });
        DB::statement('ALTER TABLE posts ADD COLUMN photos varchar[]  DEFAULT(\'{}\')');
        DB::statement('ALTER TABLE posts ADD COLUMN authors integer[]  DEFAULT(\'{}\')');
        DB::statement('ALTER TABLE posts ADD COLUMN topographies integer[]  DEFAULT(\'{}\')');
        DB::statement('ALTER TABLE posts ADD COLUMN cultures integer[]  DEFAULT(\'{}\')');

    }

    /**
     *
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
