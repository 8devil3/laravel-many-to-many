<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
   protected $fillable = [
      'city',
      'address',
      'phone',
      'user_id'
  ];

  public function user()
  {
     return $this->belongsTo('App\User');
  }
}
