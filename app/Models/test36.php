<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class test36 extends User {

  protected $table = 'users';

  use HasFactory;

  /**
   * Get the route key for the model.
   */
  public function getRouteKeyName(): string {
    return 'email';
  }
}
