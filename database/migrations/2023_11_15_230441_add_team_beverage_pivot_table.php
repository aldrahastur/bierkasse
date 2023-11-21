<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('team_beverage', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('team_id');
            $table->foreignUuid('beverage_id');
            $table->timestamps();
        });
    }
};
