<?php

namespace App;

use App\Model\ChatRoom;
use App\Model\Diagnosis;
use App\Model\Doctor;
use App\Model\OrderPackage;
use App\Model\Store;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Laravel\Passport\HasApiTokens;

/**
 * Class User
 *
 * * * Role
 * * * 0. Admin
 * * * 1. Doctor
 * * * 2. Store
 * * * 3. User
 * * Status
 * * * 0. New Member
 * * * 1. Active Member
 * * * 2. Suspend
 * * Delete
 * * * 0. UnDelete
 * * * 1. Delete
 * * * 2. Permanent Delete
 *
 * @property integer id
 * @property integer role
 * @property string username
 * @property string email
 * @property string password
 * @property string name
 * @property integer phone
 * @property integer id_ktp
 * @property string img_ktp
 * @property string img
 * @property integer status
 * @property integer delete
 */
class User extends Authenticatable
{
  use Notifiable, HasApiTokens;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'role',
    'username',
    'email',
    'name',
    'password',
    'phone',
    'id_ktp',
    'img_ktp',
    'img',
    'status',
    'delete',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id',
    'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];

  public function isOnline(): bool
  {
    return Cache::has('activeUser' . $this->id);
  }

  public function doctor()
  {
    return $this->hasOne(Doctor::class, 'user', 'id');
  }

  public function store()
  {
    return $this->hasOne(Store::class, 'user', 'id');
  }

  public function chatRoom()
  {
    return $this->hasOne(ChatRoom::class, 'user', 'id');
  }

  public function orderPackage()
  {
    return $this->hasMany(OrderPackage::class, 'user', 'id');
  }

  public function diagnosis()
  {
    return $this->hasOne(Diagnosis::class, 'user', 'id');
  }
}
