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
        Schema::create('cl_program_team_members', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('program_id');
            $table->unsignedBigInteger('team_member_id');

            // $table->integer('ordering')->default(0);

            $table->timestamps();

            $table->unique(['program_id', 'team_member_id'], 'unique_program_member');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cl_program_team_members');
    }
};
