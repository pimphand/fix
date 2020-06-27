<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderPackage
 * @package App\Model
 *
 * * Status
 * * * 0. Wait
 * * * 1. Approved
 * * * 2. Cancel
 *
 * @property integer id
 * @property integer user
 * @property integer store
 * @property string address
 * @property integer rate
 * @property string img
 * @property integer status
 */
class OrderPackage extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'address',
    'rate',
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
    'user',
    'store',
  ];

  public function user()
  {
    return $this->hasOne(User::class, 'id', 'user');
  }

  public function store()
  {
    return $this->hasOne(Store::class, 'id', 'store');
  }

  public function order()
  {
    return $this->hasMany(Order::class, 'order_package', 'id');
  }
}
