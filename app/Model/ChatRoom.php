<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use phpseclib\Math\BigInteger;

/**
 * Class ChatRoom
 * @package App\Model
 *
 * @property BigInteger id
 * @property integer doctor
 * @property integer user
 * @property string massage
 * @property integer to
 */
class ChatRoom extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'massage',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id',
    'doctor',
    'user',
    'to',
  ];

  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user');
  }

  public function doctor()
  {
    return $this->hasOne(Doctor::class, 'id', 'doctor');
  }
}
