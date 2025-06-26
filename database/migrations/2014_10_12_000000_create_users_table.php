<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('email')->unique();
        $table->string('password');
        $table->string('full_name');
        $table->enum('role', ['superuser', 'broker', 'supervisor']);
        $table->unsignedBigInteger('broker_id')->nullable(); // Only for supervisors
        $table->enum('status', ['active', 'suspended'])->default('active');
        $table->timestamp('last_login')->nullable();
        $table->timestamps();

        $table->foreign('broker_id')->references('id')->on('users')->onDelete('set null');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
