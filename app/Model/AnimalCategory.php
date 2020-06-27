<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use phpseclib\Math\BigInteger;

/**
 * Class AnimalCategory
 * @package App\Model
 *
 * @property BigInteger id
 * @property string name
 */
class AnimalCategory extends Model
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
  ];

  public function petType()
  {
    return $this->hasMany(PetType::class, 'animal_category', 'id');
  }
}
