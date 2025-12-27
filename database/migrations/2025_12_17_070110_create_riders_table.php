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
        Schema::create('riders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('UserId')->nullable();
        $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status',['active','inactive','suspended'])->default('active');
            
            //rider personal information
            $table->string('Fullname');
            $table->string('Email')->unique();
            $table->string('Phone')->unique();
            $table->date('DateOfBirth');
            //empolyment details
            $table->date('HireDate');
            $table->enum('WorkingShift',['morning','afternoon','night','flexible']);
            $table->enum('WorkingZone',['north','south','east','west','central']);
           //vehicle details
            $table->enum('VehicleType',['motorcycle','scooter','car','van']);
           $table->string("LicenseNumber")->unique();
            $table->string('PlateNumber');
            $table->string('VehicleModel');
            $table->boolean('VehicleInspected')->default(false);
           //admin
            $table->text('AdminNotes')->nullable();
            $table->boolean('TermsAccepted');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riders');
    }
};
