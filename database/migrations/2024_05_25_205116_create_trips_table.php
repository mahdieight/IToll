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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->constrained("orders")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("driver_id")->constrained("drivers")->onDelete("cascade")->onUpdate("cascade");
            $table->enum('status' , OrderStatusEnum::values());
            $table->decimal('fare');
            $table->timestamp('start_at');
            $table->timestamp('end_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
