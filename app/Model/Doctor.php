<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;
use phpseclib\Math\BigInteger;

/**
 * Class Doctor
 * @package App\Model
 *
 * @property BigInteger id
 * @property integer user
 * @property integer str
 * @property integer price
 * @property string title
 * @property string place
 * @property string address
 * @property string graduated
 * @property string active
 * @property string unactivated
 * @property string ovo
 * @property string dana
 * @property integer rate
 * @property string img
 */
class Doctor extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'str',
    'title',
    'place',
    'address',
    'graduated',
    'active',
    'unactivated',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id',
    'user',
  ];

  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user');
  }

  public function typeDoctor()
  {
    return $this->hasOne(TypeDoctor::class, 'doctor', 'id');
  }
}
