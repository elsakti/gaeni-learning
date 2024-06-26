<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->string('title');
            $table->longText('description');
            $table->date('open_date');
            $table->date('closed_date');
            $table->enum('status', ['pending', 'opened', 'closed']);
            $table->enum('type', ['link', 'pdf', 'zip']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
