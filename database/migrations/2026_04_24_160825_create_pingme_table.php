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
        Schema::create('pingme', function (Blueprint $table) {
            $table->id();
            // nullable() - it is okay to empty
            // constrained() - enforce strict rule
            // cascadeonly() -  If you delete a user from your app, the database will automatically delete all messages linked to
            //                  that user ID as well.
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('message', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pingme');
    }
};
