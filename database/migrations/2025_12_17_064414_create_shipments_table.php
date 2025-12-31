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
        Schema::create('shipments', function (Blueprint $table) {
            //order details
            $table->id();
            $table->unsignedBigInteger('UserId'); // add after id column
        $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');

$table->enum('Status', ['Pending', 'PickedUp', 'InTransit', 'Delivered'])->default('Pending');

            $table->string('TrackingNumber');
            //sender details
            $table->string('SenderName');
            $table->string('SenderPhone');
            $table->string('SenderEmail');
            //receiverdetails
            $table->string('ReceiverName');
            $table->string('ReceiverPhone');
            $table->string('ReceiverEmail')->nullable();
            //pickup details
            $table->text('PickupAddress');

            $table->enum('PickupSlot', ['morning', 'afternoon', 'evening']);

            //delivery details
            $table->text('DeliveryAddress');
           $table->enum('DeliveryZone', ['north','south','east','west','central'])->index();
            $table->enum('DeliveryType', ['standard', 'express', 'overnight']);
           $table->decimal('ParcelWeight', 5, 2);

// EXTRA DETAIL AND JOIN COLUMN
$table->timestamp('InTransitAt')->nullable();
       
$table->unsignedBigInteger('AssignedRiderId')->nullable();
        $table->timestamp('PickedUpAt')->nullable();
        $table->timestamp('DeliveredAt')->nullable();
        $table->foreign('AssignedRiderId')->references('id')->on('users')->nullOnDelete();
        $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
