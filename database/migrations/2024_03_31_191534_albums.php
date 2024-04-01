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
        //create model album
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('userId');

            // create ralation ship to users table
            $table->foreign('userId')->references('id')->on('users');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //drop table if exist -- albums
        Schema::dropIfExists('albums');
    }
};
