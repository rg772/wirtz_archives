<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('associations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(\App\Models\People::class)->constrained()->onDelete('cascade');;
            $table->foreignIdFor(\App\Models\Production::class)->constrained()->onDelete('cascade');;
            $table->foreignIdFor(\App\Models\Role::class)->constrained()->onDelete('cascade');;
            $table->string('desc')->nullable();
            $table->softDeletes();
            $table->enum('status', App\Helpers\CommonValues::getStatuses())->default('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('associations');
    }
};
