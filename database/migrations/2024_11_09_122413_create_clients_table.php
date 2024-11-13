<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->default('Livio')->change();
            $table->string('last_name')->default('Bianchi')->change();
            $table->string('email')->default('livio.bianchi@prova.it')->change();;
            $table->string('phone')->default('1234567890')->change();;
            $table->string('address')->default('Via Roma, 1')->change();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
