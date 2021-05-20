<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateFindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('fund_code')->nullable();
            $table->string('place_of_storage')->nullable();
            $table->date('date_of_find');
            $table->foreignId('culture_id')->constrained('cultures');
            $table->string('dating');

            $table->string('involved_person')->nullable();

            $table->float('length', 7, 2)->nullable();
            $table->float('width', 7, 2)->nullable();
            $table->float('height', 7, 2)->nullable();

            $table->float('weight', 8, 2)->nullable();

            $table->foreignId('object_id')->constrained('objects');
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignId('category_id')->constrained('categories');

            $table->string('find_images')->nullable();

            $table->text('description')->nullable();

            $table->float('lat', 10, 6)->nullable();
            $table->float('lng', 10, 6)->nullable();

            $table->timestamps();
        });
        DB::statement('ALTER TABLE finds ADD COLUMN authors integer[]  DEFAULT(\'{}\')');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finds');
    }
}
