<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use phpseclib\Math\BigInteger;

/**
 * Class Diagnosis
 * @package App\Model
 *
 * * Status
 * * * 0. Wait
 * * * 1. Approved
 * * * 2. Cancel
 *
 * @property BigInteger id
 * @property integer doctor
 * @property integer user
 * @property string description
 * @property integer status
 */
class Diagnosis extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'description',
    'img',
    'status',
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
