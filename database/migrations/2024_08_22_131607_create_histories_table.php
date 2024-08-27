<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('my_site_id'); // Ensure this is unsignedBigInteger
            $table->unsignedBigInteger('user_id'); // Ensure this is also unsignedBigInteger
            $table->string('pagename');
            $table->longText('content');
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('my_site_id')->references('id')->on('my_sites')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

public function down()
{
    Schema::dropIfExists('histories');
}

};
