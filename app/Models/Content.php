<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id', 'chapter', 'chapter_content'
    ];

    protected $table = "contents";
    
    protected $primaryKey = "id";

    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
