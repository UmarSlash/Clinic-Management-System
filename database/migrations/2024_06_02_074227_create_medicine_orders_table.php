<?php

use App\Models\User;
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
        Schema::create('medicine_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id');
            $table->foreignIdFor(User::class, 'staff_id')
                ->nullable()
                ->index()
                ->constrained((new User)->getTable())
                ->nullOnDelete();
            $table->string('status');
            $table->integer('quantity');
            $table->date('order_date');
            $table->date('arrive_date')->nullable();
            $table->timestamps();
            
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_orders');
    }
};
