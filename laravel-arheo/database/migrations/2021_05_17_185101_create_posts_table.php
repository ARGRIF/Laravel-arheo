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
            $table->string('code')->nullable();
            $table->date('date_of_detection');
            $table->foreignId('village_id')->constrained('villages');

            $table->string('involved_person')->nullable();

            $table->text('location_area');



            $table->string('photos')->default('default.jpg');
            $table->text('description')->nullable();

            $table->timestamps();
        });
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
