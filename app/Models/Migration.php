<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Migration extends Authenticatable {

  use HasApiTokens,
      HasFactory,
      Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
      'migration'
  ];

  /**
   * Get the route key for the model.
   */
  public function getRouteKeyName(): string {
    return 'migration';
  }
}
