<?php

use App\Enums\Collection\CollectionStatusEnum;
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
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('name', config('rules.general.name.max'));
            $table->string('phone', config('rules.general.phone.max'));
            $table->string('address', config('rules.general.address.max'));
            $table->string('webhook_url', config('rules.collection.webhook_url.max'));
            $table->enum('status' , CollectionStatusEnum::values());
            $table->timestamp('blocked_at')->nullable();
            $table->json('order_statistics')->default(json_encode(['total' => 0, 'successful' => 0, 'canceled' => 0 ]));
            $table->timestamp('last_order_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
