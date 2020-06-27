<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use phpseclib\Math\BigInteger;

/**
 * Class TypeDoctor
 * @package App\Model
 *
 * @property BigInteger id
 * @property integer doctor
 * @property integer animal_category
 */
class TypeDoctor extends Model
{
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'id',
    'doctor',
    'animal_category',
  ];

  public function doctor()
  {
    return $this->hasOne(Doctor::class, 'id', 'doctor');
  }

  public function animalCategory()
  {
    return $this->hasOne(AnimalCategory::class, 'id', 'animal_category');
  }
}
