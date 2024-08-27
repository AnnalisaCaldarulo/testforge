<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function books()
    {
        return $this->belongsToMany(Book::class);
        // this - il singolo oggetto di classe Category
        //belongs to many = è relazionato a molti
        //Book::class - oggetti di classe Book
    }
}
