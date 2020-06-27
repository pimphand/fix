<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use phpseclib\Math\BigInteger;

/**
 * Class PetType
 * @package App\Model
 *
 * @property BigInteger id
 * @property integer animal_category
 * @property string name
 */
class PetType extends Model
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
    'animal_category',
  ];

  public function animalCategory()
  {
    return $this->hasOne(AnimalCategory::class, 'id', 'animal_category');
  }
}
