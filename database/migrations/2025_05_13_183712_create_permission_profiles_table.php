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
        Schema::create('permission_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('permission_id')->unsigned();
            $table->integer('profile_id')->unsigned();
            $table->timestamps();

//            $table->foreign('profile_id')
//                ->references('id')
//                ->on('profiles')
//                ->onDelete('cascade');
//
//            $table->foreign('permission_id')
//                ->references('id')
//                ->on('permissions')
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission_profiles');
    }
};
