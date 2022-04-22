<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->constrained('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('property_id')
                ->constrained('properties')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('option_id')->nullable()
                ->constrained('options')->restrictOnDelete()->cascadeOnUpdate();
            $table->text('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('values', function (Blueprint $table) {
            $table->dropConstrainedForeignId('product_id');
            $table->dropConstrainedForeignId('property_id');
            $table->dropConstrainedForeignId('option_id');
        });
        Schema::dropIfExists('values');
    }
}
