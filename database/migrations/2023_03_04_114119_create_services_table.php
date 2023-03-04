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
    Schema::create('services', function (Blueprint $table) {
      $table->id();
      $table->foreignId('provider_id')->constrained('providers')->onDelete('cascade');
      $table->string('name');
      $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
      $table->foreignId('sub_category_id')->nullable()->constrained('sub_categories')->cascadeOnDelete();
      $table->string('description')->nullable();
      $table->string('latitude')->nullable();
      $table->string('longitude')->nullable();
      $table->enum('type', ['fixed', 'hourly']);
      $table->float('price');
      $table->float('discount')->default(0);
      $table->integer('hours')->nullable();
      $table->integer('minutes')->nullable();
      $table->boolean('status')->default(1);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('services');
  }
};
