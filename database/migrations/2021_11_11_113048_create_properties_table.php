<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
            ->constrained('categories')->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_id')
                ->constrained('types')->restrictOnDelete()->cascadeOnUpdate();
            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->unsignedInteger('weight');
            $table->boolean('is_required');
            $table->boolean('is_expandable');
            $table->boolean('is_filter');
            $table->boolean('is_sortable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropConstrainedForeignId('category_id');
            $table->dropConstrainedForeignId('type_id');
        });
        Schema::dropIfExists('properties');
    }
}
