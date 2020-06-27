<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Model
 *
 * @property integer id
 * @property integer product
 * @property integer order_package
 * @property integer qty
 * @property string description
 * @property integer status
 *
 * * Status
 * * * 0. Order
 * * * 1. Delivery
 * * * 2. Receive
 * * * 3. Cancel
 */
class Order extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'qty',
    'description',
    'status',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id',
    'product',
    'order_package',
  ];

  public function product()
  {
    return $this->hasOne(Product::class, 'id', 'product');
  }

  public function orderPackage()
  {
    return $this->hasOne(OrderPackage::class, 'id', 'order_package');
  }
}
