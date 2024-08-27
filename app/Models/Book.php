<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'plot', 'price', 'pages', 'cover', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);  //! importare la classe
        //this = singolo oggetto di calsse Book
        //belongs to = appartiene a, è relazionato con...
        //User::class = un oggetto di classe User
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
        //this = singolo oggetto di classe Book
        //belongs to many = appartiene a molti, ha relazioni con molti
        //Category::class = oggetti di classe Category
    }
}
