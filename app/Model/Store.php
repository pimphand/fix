<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 * @package App\Model
 *
 * @property integer id
 * @property integer user
 * @property string name
 * @property string full_address
 * @property string rate
 * @property string ovo
 * @property string dana
 */
class Store extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'full_address',
    'rate',
    'bank',
    'account_number',
    'ovo',
    'dana',
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

  public function orderPackage()
  {
    return $this->hasMany(OrderPackage::class, 'store', 'id');
  }
}
