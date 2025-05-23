<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('designation');
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('sub_branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
            $table->foreign('sub_branch_id')->references('id')->on('sub_branches')->onDelete('set null');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainers', function (Blueprint $table) {
            $table->dropForeign(['branch_id']);
            $table->dropForeign(['sub_branch_id']);
        });
        Schema::dropIfExists('trainers');

    }
};
