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
            $table->string('Status')->default('Pending');
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
            $table->enum('PickupTime', ['morning', 'afternoon', 'evening']);
            //delivery details
            $table->text('DeliveryAddress');
           $table->enum('DeliveryType', ['standard', 'express', 'overnight']);
           $table->decimal('ParcelWeight', 5, 2);

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
