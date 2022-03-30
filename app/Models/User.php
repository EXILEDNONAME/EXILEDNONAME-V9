<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use App\Models\Access;

class User extends Authenticatable {

  use HasApiTokens, HasFactory, Notifiable, LogsActivity, SoftDeletes;

  protected $fillable = ['id_access', 'username', 'name', 'email', 'phone', 'password', 'address_1', 'address_2'];
  protected $hidden = [ 'password', 'remember_token'];
  protected $casts = ['email_verified_at' => 'datetime'];

  public function getActivitylogOptions(): LogOptions {
    return LogOptions::defaults()->logOnly(['*']);
  }

  public function sendPasswordResetNotification($token) {
    $this->notify(new ResetPasswordNotification($token));
  }

  public function accesses(){
    return $this->belongsTo(Access::class, 'id_access');
  }

}
