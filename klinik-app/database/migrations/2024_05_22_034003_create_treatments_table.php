<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration
{
    /**
     * Menjalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien');
            $table->integer('usia');
            $table->string('alamat');
            $table->string('no_hp');
            $table->text('keluhan');
            $table->string('jenis_pengobatan');
            $table->date('tanggal_pengobatan');
            $table->decimal('harga_perawatan', 10, 2);
            $table->decimal('harga_obat', 10, 2);
            $table->json('obat'); // Menyimpan data obat dan jumlah obat dalam bentuk JSON
            $table->decimal('total_pembayaran', 10, 2)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Membatalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treatments');
    }
}
