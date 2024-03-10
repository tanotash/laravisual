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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->unsignedBigInteger('idrol');  
            $table->foreign('idrol')->references('id')->on('cargos')->onDelete('cascade');

            $table->unsignedBigInteger('idobra');
            $table->foreign('idobra')->references('id')->on('proyectos')->onDelete('cascade');
            
            $table->string('qr_path')->nullable();
            $table->text('DNI')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
