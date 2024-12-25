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
        Schema::create('menus', function (Blueprint $table) {  
            $table->id('idmenu');  
            $table->foreignId('idkategori');
            $table->string('nama_menu');  
            $table->decimal('harga', 10, 2);  
            $table->text('deskripsi');  
            $table->string('foto')->nullable();  
            $table->timestamps();  
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
