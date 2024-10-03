<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    use HasFactory;
    protected $fillable = ['title', 'author', 'slug', 'body'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function author():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
}