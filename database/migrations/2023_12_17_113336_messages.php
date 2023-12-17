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
        Schema::create('Message', function (Blueprint $table){
            $table->id('message_id');
            $table->text('text');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('User');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Message', function(Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('Message');
    }
};

/* 
    CREATE TABLE Message (
        ID BIGINT NOT NULL,
        Text TEXT NOT NULL,
        UserID BIGINT NOT NULL,
        CONSTRAINT PRIMARY KEY (ID),
        CONSTRAINT FOREIGN KEY (UserID) REFERENCES User (ID),
    );
*/
