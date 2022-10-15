<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->nullable();
            $table->string('medicineName');
            $table->string('strength');
            $table->unsignedBigInteger('medicineCategory');
            $table->unsignedBigInteger('medicineType');
            $table->string('generic')->nullable();
            $table->string('medicineCompanay');
            $table->string('medicineIndication')->nullable();
            $table->string('medicineGroup')->nullable();
            $table->string('unit');
            $table->decimal('minLevel')->nullable(); 
            $table->decimal('reOrderLevel')->nullable();  
            $table->decimal('tax')->nullable();  
            $table->string('packing')->nullable();  
            $table->decimal('packSize');  
            $table->text('modeOfAction')->nullable();  
            $table->text('note')->nullable();  
            $table->string('photo',500)->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicines');
    }
};