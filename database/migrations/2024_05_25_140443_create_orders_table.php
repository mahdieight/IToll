<?php

use App\Enums\Order\OrderStatusEnum;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("collection_id")->constrained("collections")->onDelete("cascade")->onUpdate("cascade");
            $table->string('tn')->unique()->comment('order tracking number');
            $table->enum('status', OrderStatusEnum::values());

            $table->string('source_address', config('rules.general.address.max'));
            $table->double('source_lat');
            $table->double('source_long');

            $table->string('destination_address', config('rules.general.address.max'));
            $table->double('destination_lat');
            $table->double('destination_long');

            $table->string('sender_name', config('rules.general.name.max'));
            $table->string('sender_mobile', config("rules.general.mobile.digits"));

            $table->string('receiver_name', config('rules.general.name.max'));
            $table->string('receiver_mobile', config("rules.general.mobile.digits"));

            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
