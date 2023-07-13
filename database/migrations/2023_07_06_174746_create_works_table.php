<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();

            $table->string('title', 100);
            $table->string('image_large', 200);
            $table->string('image_secondary_one', 200)->nullable();
            $table->string('image_secondary_two', 200)->nullable();
            $table->string('image_secondary_three', 200)->nullable();
            $table->string('link', 200);
            $table->string('github', 200);
            $table->text('description')->nullable();
            $table->string('short_description', 200);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
};
