<?php

use App\Enum\DroneState;
use App\Enum\ErrandStatus;
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
        Schema::create('drones', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('serial_no', 100);
            $table->string('model');
            $table->unsignedBigInteger('weight_limit');
            $table->unsignedInteger('battery_capacity');
            $table->string('state')->default(DroneState::IDLE->value);
            $table->json('metadata')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('medications', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->string('name');
            $table->string('code');
            $table->unsignedBigInteger('weight');
            $table->string('image');
            $table->json('metadata')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('errands', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->unsignedInteger('drone_id');
            $table->unsignedInteger('medication_id');
            $table->string('description');
            $table->string('status')->default(ErrandStatus::IN_PROGRESS->value);
            $table->json('metadata')->nullable();
            $table->longText('last_exception')->nullable();
            $table->timestamp('last_exception_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drones');

        Schema::dropIfExists('medications');

        Schema::dropIfExists('errands');
    }


};
