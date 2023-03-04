<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoryTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("sub_categories", function (Blueprint $table) {
      $table->id();
      $table->foreignId("category_id")->constrained("categories");
      $table->string("name", 255);
      $table->text("image", 5000)->nullable();
      $table->text("description", 5000)->nullable();
      $table->boolean("status")->default(1);
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
    Schema::dropIfExists("subcategory");
  }
}
