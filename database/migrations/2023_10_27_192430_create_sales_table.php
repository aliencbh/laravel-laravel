<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

  /**
   * Run the migrations.
   */
  public function up(): void {
    DB::table('users')->insert(
      [
          ['name' => 'user1', 'email' => 'user1@gmail.com', 'password' => '$2y$12$vGUsZcs9jjSUFXP45TjuhebhNAZPODTD6dLQJRwQmbU4XH4lsT9fq'],
          ['name' => 'user2', 'email' => 'user2@gmail.com', 'password' => '$2y$12$vGUsZcs9jjSUFXP45TjuhebhNAZPODTD6dLQJRwQmbU4XH4lsT9fq']
      ]
    );
    Schema::create('sales', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('user_id');
      $table->bigInteger('product_id');
      $table->bigInteger('buy_price');
    });
    Schema::create('customers', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('user_id');
      $table->bigInteger('role_id');
    });
    DB::table('customers')->insert(
      [
          ['user_id' => 1, 'role_id' => 2],
          ['user_id' => 2, 'role_id' => 1]
      ]
    );
    Schema::create('roles', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('role');
    });
    DB::table('roles')->insert(
      [
          ['role' => 'agent'],
          ['role' => 'leader']
      ]
    );
    Schema::create('products', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->bigInteger('group');
      $table->string('price');
    });
    DB::table('products')->insert(
      [
          ['name' => 'pen', 'group' => 1, 'price' => '5,4.8;4.6,4.4,4.2,4'],
          ['name' => 'pencil', 'group' => 1, 'price' => '4,3.8,3.6,3.4,3.2,3'],
          ['name' => 'eraser', 'group' => 1, 'price' => '3,2.8,2.6,2.4,2.2,2'],
          ['name' => 'apple', 'group' => 2, 'price' => '6,5.8,5.6,5.4,5.2,5'],
          ['name' => 'orange', 'group' => 2, 'price' => '7,6.8,6.6,6.4,6.2,6'],
          ['name' => 'watermelon', 'group' => 2, 'price' => '8,7.8,7.6,7.4,7.2,7']
      ]
    );
    Schema::create('quantityPrices', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('role_id');
      $table->string('quantity_price');
    });
    DB::table('quantityPrices')->insert(
      [
          ['role_id' => 1, 'quantity_price' => '0,24,48,120'],
          ['role_id' => 2, 'quantity_price' => '0,24,48,120,240,480']
      ]
    );
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('sales');
  }
};
