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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('id_mektep');
            $table->integer('id_class');
            $table->string('name');
            $table->string('surname');
            $table->string('lastname');
            $table->string('name_latin');
            $table->string('surname_latin');
            $table->string('lastname_latin');
            $table->string('iin');
            $table->date('birthday');
            $table->string('pol');
            $table->string('national');
            $table->string('photo_file');
            $table->integer('parent_ata_id');
            $table->integer('parent_ana_id');
            $table->string('status');
            $table->string('login');
            $table->string('pass');
            $table->string('email');
            $table->string('access');
            $table->string('access_by');
            $table->integer('access_iin');
            $table->date('access_date');
            $table->date('access_expire');
            $table->dateTime('last_visit');
            $table->dateTime('last_visit_out');
            $table->string('remote_ip');
            $table->string('remote_host');
            $table->string('remote_browser');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
