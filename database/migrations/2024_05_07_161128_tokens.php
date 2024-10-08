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
        Schema::create('tokens', function (Blueprint $table) {
            $table->id();
            $table->string('givenTo');
            $table->unsignedBigInteger('given_by');
            $table->foreign('given_by')->references('id')->on('users');
            // $table->string('givenBy');
            $table->dateTime('dateIssued', precision: 0);
            $table->integer('no_of_tokens_given')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('tokens');
    }
};
