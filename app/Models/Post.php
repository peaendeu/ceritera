<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  // protected $fillable = ['title', 'excerpt', 'body'];
  protected $guarded = ['id'];
  protected $with = ['category', 'author'];

  public function scopeFilter($query, $filters)
  {
    // if (isset($filters['search']) ? $filters['search'] : false) {
    //   return $query->where('title', 'like', '%' . $filters['search'] . '%')
    //     ->orWhere('body', 'like', '%' . $filters['search'] . '%');
    // }

    $query->when(
      $filters['cari'] ?? false,
      function ($query, $cari) {
        return $query->where('title', 'like', '%' . $cari . '%')
          ->orWhere('body', 'like', '%' . $cari . '%');
      }
    );

    $query->when(
      $filters['kategori'] ?? false,
      function ($query, $kategori) {
        return $query->whereHas('category', function ($query) use ($kategori) {
          $query->where('slug', $kategori);
        });
      }
    );

    $query->when(
      $filters['penulis'] ?? false,
      fn ($query, $penulis) =>
      $query->whereHas(
        'author',
        fn ($query) =>
        $query->where('username', $penulis)
      )
    );
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }

  public function getRouteKeyName()
  {
    return 'slug';
  }
}
