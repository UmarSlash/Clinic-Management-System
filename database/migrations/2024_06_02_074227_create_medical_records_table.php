<?php

use App\Models\Billing;
use App\Models\Medicine;
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
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'patient_id')
                ->nullable()
                ->index()
                ->constrained((new User)->getTable())
                ->nullOnDelete();
            $table->foreignIdFor(User::class, 'staff_id')
                ->nullable()
                ->index()
                ->constrained((new User)->getTable())
                ->nullOnDelete();
            $table->foreignIdFor(Billing::class)
                ->nullable()
                ->index()
                ->constrained((new Billing)->getTable())
                ->nullOnDelete();
            $table->foreignIdFor(Medicine::class)
                ->nullable()
                ->index()
                ->constrained((new Medicine)->getTable())
                ->nullOnDelete();
            $table->integer('dosage');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_records');
    }
};
