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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // field to show the post belongs to user_id (convention)
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // table is an instance of the Blueprint
            $table->string('title');
            $table->text('body');
            // the 2 tables for the POSTs: title and body
            // to actually create - php artisan migrate
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
