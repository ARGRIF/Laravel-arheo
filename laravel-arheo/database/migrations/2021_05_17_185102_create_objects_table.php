<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->date('date_of_detection');
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignId('culture_id')->constrained('cultures');

            $table->foreignId('topography_id')->constrained('topographies');

            $table->string('involved_person')->nullable();
            $table->jsonb('location_area');

            $table->text('description')->nullable();


            $table->timestamps();

        });
        DB::statement('ALTER TABLE objects ADD COLUMN authors integer[]  DEFAULT(\'{}\')');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}
