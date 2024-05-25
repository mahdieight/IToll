<?php

use App\Enums\Driver\VehicleTypeEnum;
use App\Enums\General\GenderEnum;
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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', config("rules.general.first_name.max"));
            $table->string('last_name', config("rules.general.last_name.max"));
            $table->string('national_code', config("rules.general.national_code.digits"));
            $table->string('mobile', config("rules.general.mobile.digits"));
            $table->string('phone', config("rules.general.phone.max"))->nullable();
            $table->enum('gender', GenderEnum::values());
            $table->enum('vehicle_type', VehicleTypeEnum::values());
            $table->json('trip_statistics')->default(json_encode(['total' => 0, 'successful' => 0, 'canceled' => 0]));
            $table->date('date_of_birth')->nullable();
            $table->timestamp('blocked_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
