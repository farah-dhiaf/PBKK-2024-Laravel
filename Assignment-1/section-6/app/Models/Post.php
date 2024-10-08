<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
class Post extends Model{
    use HasFactory;

    protected $with = ['author', 'category']; // eager loading
    protected $fillable = ['title', 'author', 'slug', 'body'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function author():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $query, array $filters):void{
        $query->when($filters['search'] ?? false, 
        fn($query, $search)=>
            $query->where('title', 'like', '%'. $search . '%')
        );
        $query->when($filters['category'] ?? false, 
        fn($query, $category)=>
        //query terhadap relasi category, 
            $query->whereHas('category', fn($query)=>$query->where('slug', $category))
        );
        $query->when($filters['author'] ?? false, 
        fn($query, $author)=>
        //query terhadap relasi author, 
            $query->whereHas('author', fn($query)=>$query->where('username', $author))
        );
    }
}