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
        Schema::create('personals', function (Blueprint $table) {

            $table->id();
            $table->integer('id_mektep');
            $table->string('name');
            $table->string('surname');
            $table->string('lastname');
            $table->string('iin');
            $table->date('birthday');
            $table->string('pol');
            $table->string('pay');
            $table->string('curdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal');
    }
};
