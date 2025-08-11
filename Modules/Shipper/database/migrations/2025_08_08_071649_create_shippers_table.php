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
       Schema::create('shippers', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('vendor_id');
    $table->string('name');
    $table->string('address1')->nullable();
    $table->string('address2')->nullable();
    $table->enum('status', ['active', 'disabled'])->default('active');
    $table->softDeletes();
    $table->timestamps();

    // Unique vendor_id + name combination
    $table->unique(['vendor_id', 'name']);

    // Foreign key constraint
    $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('shippers', function (Blueprint $table) {
        $table->dropForeign(['vendor_id']);
        $table->dropUnique(['vendor_id', 'name']);
    });

    Schema::dropIfExists('shippers');
}

};
