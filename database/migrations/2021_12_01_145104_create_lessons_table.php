<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')
                ->constrained('chapters')
                ->cascadeOnDelete();
            $table->foreignId('course_id')
                ->constrained('courses')
                ->cascadeOnDelete()
                ->nullable();
            $table->string('name'); 
            $table->text('description'); 
            $table->string('video');
            $table->string('video_name')->nullable();
            $table->string('file')->nullable();
            $table->string('file_name')->nullable();
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
        Schema::dropIfExists('lessons');
    }
}
