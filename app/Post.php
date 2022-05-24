<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
   protected $fillable = [
      'title',
      'content',
      'author',
      'date',
      'slug',
      'user_id',
      'category_id'
   ];

   static public function genSlug($string)
   {
      $baseSlug = Str::slug($string, '-');
      $slug = $baseSlug;
      $i = 1;

      while(self::where('slug', $slug)->first()){
         $slug = $baseSlug . "-" . $i;
         $i++;
      }

      return $slug;
   }

   public function getRouteKeyName()
   {
      return 'slug';
   }

   public function user()
   {
      return $this->belongsTo('App\User');
   }

   public function category()
   {
      return $this->belongsTo('App\Category');
   }

   public function tags()
   {
      return $this->belongsToMany('App\Tag');
   }
}
