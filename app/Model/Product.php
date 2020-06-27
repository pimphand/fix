<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Model
 *
 * @property integer id
 * @property integer store
 * @property string name
 * @property integer qty
 * @property integer price
 * @property string description
 * @property integer rate
 */
class Product extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
    'qty',
    'price',
    'description',
    'rate',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id',
    'store',
  ];

  public function store()
  {
    return $this->hasOne(Store::class, 'id', 'store');
  }

  public function image()
  {
    return $this->hasMany(ProductImage::class, 'product', 'id');
  }
}
