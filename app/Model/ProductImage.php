<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductImage
 * @package App\Model
 *
 * @property integer id
 * @property integer product
 * @property string name
 */
class ProductImage extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id',
    'product',
  ];

  public function product()
  {
    return $this->hasOne(Product::class, 'id', 'product');
  }
}
