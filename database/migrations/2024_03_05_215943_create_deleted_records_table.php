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
        Schema::create('deleted_records', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('idrol')->nullable();  
            $table->string('idobra')->nullable();
            $table->string('qr_path')->nullable();
            $table->text('DNI')->nullable();
            $table->string('original_id');
            $table->string('delete_by');
            $table->string('deleted_at')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deleted_records');
    }
};
