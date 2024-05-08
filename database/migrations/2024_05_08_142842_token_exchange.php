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
        Schema::create('token_exchange', function(Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Tokens::class)->constrained();
            $table->foreignIdFor(\App\Models\Prizes::class)->constrained();
            $table->dateTime('dateExchanged', precision:0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('token_exchange');
    }
};
