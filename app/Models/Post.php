<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'user']; //eager loading

    public function scopeFilter($query, array $filters){
      // ketika ada array filters['search], maka ambil filters['search'] dan disimpan ke parameter $search. jika tidak maka langsung mengambil get() di controller
      $query->when($filters['search'] ?? false, function($query, $search){
        return $query->where('title', 'like', '%'. $search . '%')
                    ->orWhere('body', 'like', '%'. $search . '%');
      });

      $query->when($filters['category'] ?? false, function($query, $category){
        return $query->whereHas('category', function($query) use($category){
          $query->where('slug', $category);
        });
      });

      // menggunakan arrow funciton php 7+
      $query->when($filters['user']?? false, fn($query, $author) =>
            $query->whereHas('user', fn($query) => 
              $query->where('username', $author)
            )
      );
    }

    public function category()
    {
      return $this->belongsto(Category::class); //relasi one to one dengan model category
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
