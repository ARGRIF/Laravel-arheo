<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('fund_code');
            $table->string('place_of_storage');
            $table->date('date_of_find');
            $table->foreignId('culture_id')->constrained('cultures');
            $table->string('dating');

            $table->float('length', 7, 2);
            $table->float('width', 7, 2);
            $table->float('height', 7, 2);

            $table->float('weight', 8, 2);

            $table->foreignId('object_id')->constrained('objects');
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignId('author_id')->constrained('users');


            $table->float('lat', 10, 6);
            $table->float('lng', 10, 6);
            $table->string('name');
            $table->timestamps();
        });
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
