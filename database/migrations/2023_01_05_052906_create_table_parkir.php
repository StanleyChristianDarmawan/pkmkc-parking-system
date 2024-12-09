<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableParkir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parkir', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_tarif');
            $table->string('kode_parkir')->unique();
            $table->string('durasi', 50);
            $table->integer('harga');
            $table->tinyInteger('status');
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tarif')->references('id')->on('tarif')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parkir', function (Blueprint $table) {
            $table->dropForeign(['id_user']); // Drop foreign key id_user
            $table->dropForeign(['id_tarif']); // Drop foreign key id_tarif
        });
        Schema::dropIfExists('parkir'); // Hapus tabel parkir
    }
}
