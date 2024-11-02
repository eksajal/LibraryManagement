<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Create extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'username',
        'price',
        'royalty',
    ];


    public function book(){

        return $this->belongsTo(Book::class);

    }

    public function user(){

        return $this->belongsTo(User::class);

    }

    
    public function borrow(){

        return $this->belongsTo(Borrow::class);

    }

    public function category(){

        return $this->belongsTo(Category::class);

    }


}
