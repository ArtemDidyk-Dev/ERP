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
        Schema::create('analytics', function (Blueprint $table) {
            $table->id()->index();
            $table->string('offer');
            $table->string('geo');
            $table->decimal('income', 20, 2 );
            $table->decimal('expenses', 20, 2);
            $table->string('source');
            $table->string('vertical',);
            $table->decimal('roi',  20, 2);
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analytics');
    }
};
