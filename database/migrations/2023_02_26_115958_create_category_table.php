<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("categories", function (Blueprint $table) {
      $table->id();
      $table->string("name", 255);
      $table->string("description", 3000)->nullable();
      $table->text("image", 3000)->nullable();
      $table->boolean("status")->nullable()->default(1);
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
    Schema::dropIfExists("category");
  }
}
