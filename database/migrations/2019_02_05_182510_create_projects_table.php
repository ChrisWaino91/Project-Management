<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('owner_id')->unsigned();
            $table->text('description');
            $table->text('notes')->nullable();
            $table->timestamps();

            // This line here refers to a 'foreign' (different) table
            // Where, the owner_id field in this table will reference the users field in the Users table
            // onDelete(cascase) means that this will delete all relevant projects if the user is deleted
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
