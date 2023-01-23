<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category()
    {
      return $this->belongsto(Category::class); //relasi one to one dengan model category
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
